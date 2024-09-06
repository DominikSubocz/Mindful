
function format(type){
    var sel = window.getSelection(); 
    type = type.querySelector(".fa").className;

    if(sel.rangeCount){
        const newText = document.createElement("span");
        var range = sel.getRangeAt(0);
        var styledElement = window.getSelection().getRangeAt(0).endContainer.parentNode;
        newText.innerHTML = sel.toString();

        console.log(styledElement);
        if(type === "fa fa-alig-left"){
          if(styledElement.style.alignText === "left"){
            newText.style.alignText = "initial";
          } else {
            newText.style.alignText = "left";
          }
        } else {
          if(type === "fa fa-alig-center"){
            if(styledElement.style.alignText === "center"){
              newText.style.alignText = "initial";
            } else {
              newText.style.alignText = "center";
            }
          } else {
            if(type === "fa fa-alig-right"){
              if(styledElement.style.alignText === "right"){
                newText.style.alignText = "initial";
              } else {
                newText.style.alignText = "right";
              }
            } 
          }
        }
        if(type === "fa fa-bold"){
          if(styledElement.style.fontWeight === "bold"){
            newText.style.fontWeight = "normal";
          } else {
            newText.style.fontWeight = "bold";
          }
        } else{
          if(type === "fa fa-italic"){
            if(styledElement.style.fontStyle === "italic"){
              newText.style.fontStyle = "normal";
            } else {
              newText.style.fontStyle = "italic";
            }
          } else {
            if(type === "fa fa-underline"){
              if(styledElement.style.textDecoration === "underline"){
                newText.style.textDecoration = "none";
              } else {
                newText.style.textDecoration = "underline";
              }
            } else {
              if(type === "fa fa-strikethrough"){
                if(styledElement.style.textDecoration === "line-through"){
                  newText.style.textDecoration = "none";

                } else {
                newText.style.textDecoration = "line-through";
              }
              } else{
                if(type === "fa fa-list"){
                  let list = "<ul>\n"
                  console.log(sel.toString());
                  let text = sel.toString();
                  const myArray = text.split("\n");
                  console.log(myArray);
                  if(myArray.length > 1){
                    for(let i = 0; i < myArray.length; i++){
                      list = list + "<li>" + myArray[i] + "</li>\n";
                    }

                    list = list + "\n</ul>";

                    console.log(list);
                    console.log(myArray.length);

                    newText.innerHTML = list;
                  }
                } else {
                  if(type === "fa fa-list-ol"){
                    let list = "<ol>\n"
                    console.log(sel.toString());
                    let text = sel.toString();
                    const myArray = text.split("\n");
                    console.log(myArray);
                    if(myArray.length > 1){
                      for(let i = 0; i < myArray.length; i++){
                        list = list + "<li>" + myArray[i] + "</li>\n";
                      }
  
                      list = list + "\n</ol>";
  
                      console.log(list);
                      console.log(myArray.length);
  
                      newText.innerHTML = list;
                  }
                } else {
                  if(type === "fa fa-quote-left"){
                    const fragment = range.cloneContents();
                    newText.innerHTML = "\"" + sel.toString() + "\"";
                  }
                }
              }
            }
          }

        }
        

  

      
        range.deleteContents(); 
        range.insertNode(newText);
    }
  }
}