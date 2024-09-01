
function format(type){
    var sel = window.getSelection(); 
    type = type.querySelector(".fa").className;

    if(sel.rangeCount){
        const newText = document.createElement("p");

        // and give it some content
        const newContent = document.createTextNode(sel.toString());

        console.log(sel.toString());
        
      
        // add the text node to the newly created div
        newText.appendChild(newContent);
        switch(type) {
            case "fa fa-align-left":
                newText.style.textAlign = "left";
              break;
            case "fa fa-align-center":
                newText.style.textAlign = "center";
              break;
            case "fa fa-align-right":
              newText.style.textAlign = "right";
              break;
            case "fa fa-bold":
              newText.style.fontWeight = "bold";
              break;
            default:
              // code block
          }
      
        // add the newly created element and its content into the DOM
        var range = sel.getRangeAt(0);
        range.deleteContents(); // Deletes selected text   
        
        const currentDiv = document.getElementById("editorText");
        console.log(newText);
        currentDiv.appendChild(newText);

    }
 
}