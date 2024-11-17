
document.getElementById("saveForm").addEventListener("submit", saveArticle, false)

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
        var styledElement = window.getSelection().getRangeAt(0).endContainer.parentElement;
        console.log(range);
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

function fontSize(size){

  var sel = window.getSelection();
  var range = sel.getRangeAt(0);
  var styledElement = window.getSelection().getRangeAt(0).endContainer.parentNode;

  var newText = document.createElement("span");
  newText.appendChild(range.extractContents());
  if(sel.rangeCount){
    newText.style.fontSize = size + "px";
  }

  range.deleteContents();
  range.insertNode(newText);


}

function sanitize(string) {
  const map = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#x27;',
      "/": '&#x2F;',
  };
  const reg = /[&<>"'/]/ig;
  return string.replace(reg, (match)=>(map[match]));
}

function saveArticle(event) {
  
  event.preventDefault();

  var postId = document.getElementById("hiddenPostId");
  var contentDiv = document.getElementById("editorTextArea");
  var heading = document.getElementById("heading").value;  // Assuming heading is an input element
  var subHeading = document.getElementById("subHeading").value;  // Assuming subHeading is an input element

  // Get the HTML content of the editor
  var content = contentDiv.innerHTML;

  // Create an XMLHttpRequest object
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
      }
  }

  // Send a GET request with the content as a query string
  xmlhttp.open("GET", "saveArticle.php?id=" + postId.value +
               "&heading=" + encodeURIComponent(heading) + 
               "&content=" + encodeURIComponent(content) + 
               "&sub_heading=" + encodeURIComponent(subHeading), true);
  xmlhttp.send();
}

function loadArticle(id) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var responseArray = JSON.parse(this.responseText);
          console.log(responseArray);

          document.getElementById("heading").value = responseArray.heading;
          document.getElementById("subHeading").value = responseArray.sub_heading;

          var content = document.createElement("span");

          content.innerHTML = responseArray.content;

          document.getElementById("test").appendChild(content);
      }
  }

  // Send a GET request with the content as a query string
  xmlhttp.open("GET", "loadPost.php?id=" + id);
  xmlhttp.send();
}
