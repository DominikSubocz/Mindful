


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
  const imgSpan = document.createElement("span");
  const belowSpan = document.createElement("span");

  imgSpan.contentEditable = "true";
  belowSpan.contentEditable = "true";


  imageDiv.className = "editorImageText"
  newImg.className = "postImg"
  newImg.src = img;
  imageDiv.appendChild(newImg);

  imageDiv.appendChild(imgSpan);
  document.getElementById("editorTextArea").appendChild(imageDiv);
  document.getElementById("editorTextArea").appendChild(belowSpan);

}

document.getElementById("close").addEventListener("click", hideAssets);



function format(type){
    var sel = window.getSelection(); 
    type = type.querySelector(".fa").className;

    if(sel.rangeCount){
        const newText = document.createElement("span");
        let text = "";
        var range = sel.getRangeAt(0);
        var styledElement = window.getSelection().getRangeAt(0).endContainer.parentNode;
        if((type != "fa fa-list") && (type != "fa fa-list-ol") && (type != "fa fa-quote-left")){
          newText.appendChild(range.extractContents());
        } else{
          text = sel.toString();
        }

        console.log(styledElement);
        if(type === "fa fa-bold"){
          if(styledElement.style.fontWeight === "bold"){
            newText.style.fontWeight = "normal";
          } else {
            newText.style.fontWeight = "bold";
          }
        } else if(type === "fa fa-italic"){
          if(styledElement.style.fontStyle === "italic"){
            newText.style.fontStyle = "normal";
          } else {
            newText.style.fontStyle = "italic";
          }
        } else if(type === "fa fa-underline"){
          if(styledElement.style.textDecoration === "underline"){
            newText.style.textDecoration = "none";
          } else {
            newText.style.textDecoration = "underline";
          }
        } else if(type === "fa fa-strikethrough"){
          if(styledElement.style.textDecoration === "line-through"){
            newText.style.textDecoration = "none";
  
          } else {
          newText.style.textDecoration = "line-through";
        }
      } else if(type === "fa fa-list"){
        let list = "<ul>\n"
        const myArray = text.split("\n");
        if(myArray.length > 1){
          for(let i = 0; i < myArray.length; i++){
            list = list + "<li>" + myArray[i] + "</li>\n";
          }

          list = list + "\n</ul>";

          console.log(list);
          console.log(myArray.length);
          newText.innerHTML = list;
        }
      } else if(type === "fa fa-list-ol"){
        let list = "<ol>\n"
        const myArray = text.split("\n");
        if(myArray.length > 1){
          for(let i = 0; i < myArray.length; i++){
            list = list + "<li>" + myArray[i] + "</li>\n";
          }

          list = list + "\n</ol>";

          console.log(list);
          console.log(myArray.length);
          newText.innerHTML = list;
      }
    }  else if(type === "fa fa-quote-left"){
      text = "\"" + text + "\"";
      newText.innerHTML = text;
    }

    range.deleteContents();
    range.insertNode(newText);

  }


}