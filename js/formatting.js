
function format(type){
    var sel = window.getSelection(); 
    type = type.querySelector(".fa").className;

    if(sel.rangeCount){
        const newText = document.createElement("p");

        // and give it some content
        const newContent = document.createTextNode(sel.toString());
      
        // add the text node to the newly created div
        newText.appendChild(newContent);
        switch(type) {
            case "fa fa-align-left":
                newText.style.textAlign = "left";
              break;
            case "fa fa-align-center":
                newText.style.textAlign = "center";
              break;
            default:
              // code block
          }
      
        // add the newly created element and its content into the DOM
        const currentDiv = document.getElementById("editorTextArea");
        currentDiv.appendChild(newText);
        var range = sel.getRangeAt(0);
        range.deleteContents(); // Deletes selected text   
    }
 
}