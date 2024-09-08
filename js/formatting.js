


function showAssets(){
  document.getElementById("myModal").style.display = "block";
}

function hideAssets(){
  document.getElementById("myModal").style.display = "none";

}

function insertImg(img){
  hideAssets();
  
  const newImg = document.createElement("img");
  const imageDiv = document.createElement("div");

  imageDiv.className = "editorImageText"
  newImg.className = "postImg"
  newImg.src = img;
  imageDiv.appendChild(newImg);

  document.getElementById("editorTextArea").appendChild(imageDiv);
}

document.getElementById("close").addEventListener("click", hideAssets);



function format(type){
    var sel = window.getSelection(); 
    type = type.querySelector(".fa").className;

    if(sel.rangeCount){
        const newText = document.createElement("span");
        var range = sel.getRangeAt(0);
        var styledElement = window.getSelection().getRangeAt(0).endContainer.parentNode;
        newText.appendChild(range.extractContents());

        console.log(styledElement);
        if(type === "fa fa-bold"){
          if(styledElement.style.fontWeight === "bold"){
            newText.style.fontWeight = "normal";
          } else {
            newText.style.fontWeight = "bold";
          }
        } else {
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
        }

      range.insertNode(newText);
      sel.removeAllRanges();

  }
}