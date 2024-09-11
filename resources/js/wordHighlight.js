const handleSelectText = async () => {
    const selectedNodes = getSelectedNodes();
    const highlight = _createAndReturnHighlight();

    highlightText(selectedNodes, highlight);

    const selectedText = getTextContentFromHighlight();

    displayOriginal(selectedText);
    displayTranslation("");

    const translation = await getTranslation(selectedText);

    displayTranslation(translation);
};

const getTranslation = async (text) => {
    const res = await fetch(`/translate/mi/${text}`, {})
    const data = await res.json();

    return data.data.translations[0].translatedText;
};

const displayOriginal = (selectedText) => {
    const dictionary = document.getElementById("dictionary-original");

    if(!dictionary) return;

    dictionary.textContent = selectedText;
};

const displayTranslation = (translatedText) => {
    const dictionary = document.getElementById("dictionary-input");

    if(!dictionary) return;

    dictionary.value = translatedText;
};

const getTextContentFromHighlight = () => {
    const highlight = document.getElementById("selected-text");

    if(!highlight) return;

    return formatWord(highlight.textContent);
};

const getSelectedNodes = () => {
    const selection = window.getSelection().getRangeAt(0)

    const startNode = selection.startContainer.nodeValue === " " || selection.startContainer.nodeValue === "\n"
        ? 
        selection.startContainer.nextSibling 
        : 
        selection.startContainer.parentElement;

    const endNode = selection.endContainer.nodeValue === " " || selection.endContainer.nodeValue === "\n"
        ? 
        selection.endContainer.previousSibling 
        : 
        selection.endContainer.parentElement;

    const containerNode = startNode?.parentElement.id === "selected-text" 
        ? 
        startNode?.parentElement.parentElement
        :
        startNode?.parentElement;

    window.getSelection()?.removeAllRanges();

    return {
        startNode: startNode,
        endNode: endNode,
        containerNode: containerNode
    }
}


const formatWord = (str) => {
    if(!str) return "";
    str = str.replace( /  +/g, ' ' );
    return str.replace(/[^a-z0-9 āēīōū]/gi, '').toLowerCase();
};


const removeHighlight = () => {
    const currenthighlight = document.getElementById("selected-text");
    if(currenthighlight){
        currenthighlight?.replaceWith(...currenthighlight.childNodes);
    }
};

const _createAndReturnHighlight = () => {
    const highlight = document.createElement("span")
    highlight.classList.add("selected-text");
    highlight.id = "selected-text"

    return highlight
}

const highlightText = (selectedNodes, highlight) => {

    const startNode = selectedNodes.startNode;
    const endNode = selectedNodes.endNode;
    const containerNode = selectedNodes.containerNode;

    if(!startNode || !endNode || !containerNode) return;
    
    removeHighlight();

    const maxPhraseLength = 10;

    // get ids as integers "w1" -> 1
    let startIndex = parseInt(startNode.id.substring(1));
    let endIndex = parseInt(endNode.id.substring(1));

    if(endIndex > (startIndex + maxPhraseLength)){
        endIndex = startIndex + maxPhraseLength;
    }

    // insert
    containerNode.insertBefore(highlight, startNode)

    // pack children
    for(let i=startIndex;i<=endIndex;i++){
        const toAppend = document.getElementById("w"+i)
        const nextSibling = toAppend?.nextSibling;

        if(toAppend && toAppend?.parentElement?.id === containerNode.id){
            highlight.appendChild(toAppend)
        }else{
            return removeHighlight();
        };

        if(nextSibling && i !== endIndex){
            highlight.appendChild(nextSibling)
        }
    }
};
