var commentSubmit = document.getElementById('commentSubmit');

commentSubmit.onclick = function() {addComment(document.getElementById('newCommentTitle'), document.getElementById('newComment'));};

function addComment(titleField, contentField) {

  // ***** generate comment *****
  var commentBox = document.getElementById('newCommentBox');
  var commentList = document.getElementById('commentList');

  var listItem = document.createElement('li');
  commentList.insertBefore(listItem, commentList.firstChild);

  var commentDiv = document.createElement('div');
  commentDiv.classList.add('prodComment');
  listItem.appendChild(commentDiv);

  var inlineDiv = document.createElement('div');
  inlineDiv.classList.add('inlineEle');
  inlineDiv.classList.add('username');
  commentDiv.appendChild(inlineDiv);

  var p = document.createElement('p');
  inlineDiv.appendChild(p);

  var username = document.createTextNode('Joe Schmoe')
  p.appendChild(username);

  var title = document.createElement('h3');
  title.classList.add('inlineEle');
  commentDiv.appendChild(title);

  var titleText = document.createTextNode(document.getElementById('newCommentTitle').value);
  title.appendChild(titleText);

  var content = document.createElement('p');
  commentDiv.appendChild(content);

  var contentText = document.createTextNode(document.getElementById('newComment').value)
  content.appendChild(contentText);

  var reply = document.createElement('button');
  reply.type = 'button';
  reply.name = 'reply';
  reply.classList.add('prodCommentButton');
  commentDiv.appendChild(reply);

  var replyText = document.createTextNode('Reply');
  reply.appendChild(replyText);

  reply.onclick = function() {  }
}

function addReply(titleField, contentField, parent) {

}
