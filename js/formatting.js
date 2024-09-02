
function format(type){
    var sel = window.getSelection(); 
    type = type.querySelector(".fa").className;

    if(sel.rangeCount){
        const newText = document.createElement("span");
        var range = sel.getRangeAt(0);
        var styledElement = window.getSelection().getRangeAt(0).endContainer.parentNode;

        console.log(styledElement);

        if(type === "fa fa-bold"){
          if(styledElement.style.fontWeight === "bold"){
            newText.style.fontWeight = "normal";
          } else {
            newText.style.fontWeight = "bold";
          }
        } 
        
        if(type === "fa fa-italic"){
          if(styledElement.style.fontStyle === "italic"){
            newText.style.fontStyle = "normal";
          } else {
            newText.style.fontStyle = "italic";
          }
        }

        if(type === "fa fa-underline"){
          if(styledElement.style.textDecoration === "underline"){
            newText.style.textDecoration = "none";
          } else {
            newText.style.textDecoration = "underline";
          }
        }
  

        newText.innerHTML = sel.toString();
      
        range.deleteContents(); 
        range.insertNode(newText);
    }
 
}