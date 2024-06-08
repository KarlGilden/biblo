const handleSelectText = async () => {
    removeHighlight();

    selectText();

    const selectedText = getSelectedText();
    displayOriginal(selectedText);
    displayTranslation("");

    const translation = await getTranslation(selectedText);
    displayTranslation(translation);
};

const getTranslation = async (text) => {
    const res = await fetch(`/translate/mi/${text}`, {})

    const data = await res.json();
    console.log(data)
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

const getSelectedText = () => {
    const highlight = document.getElementById("selected-text");

    if(!highlight) return;

    return formatWord(highlight.textContent);
};

const selectText = () => {

    const selection = window.getSelection().getRangeAt(0)
    window.getSelection()?.removeAllRanges();

    const startNode = selection.startContainer.nodeValue === " " 
        ? 
        selection.startContainer.nextSibling 
        : 
        selection.startContainer.parentElement;

    const endNode = selection.endContainer.nodeValue === " " 
        ? 
        selection.endContainer.previousSibling 
        : 
        selection.endContainer.parentElement;

    const containerNode = startNode?.parentElement;

    if(!startNode || !endNode || !containerNode) return;

    // if selection starts within a selected text
    if(containerNode.id === "selected-text"){
         return startNode.parentElement?.replaceWith(...startNode.parentElement.childNodes);
    }

    const highlight = _createAndReturnHighlight();

    _highlightText(startNode, endNode, containerNode, highlight);
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


const _highlightText = (startNode, endNode, containerNode, highlight) => {
   
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
