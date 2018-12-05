// first, hook up the comment submit button
var commentSubmit = $('#commentSubmit');
if (commentSubmit != null) {
  commentSubmit.onclick = function() { postComment(null); };
}

// then, hook up the reply buttons
var replySubmits = $("button[name='reply']")
if (replySubmits =! null && replySubmits.length > 0) {
  for (var counter = 0; counter < replySubmits.length; counter++) {
    replySubmits[counter].onclick = function() { addFields(replySubmits[counter].parent()) }
  }
}

function addFields(parent) {
  // if there's another reply box open, get rid of it
  var previousReplyBox = $('#newReplyBox');
  if (previousReplyBox != null) {
    previousReplyBox.remove();
  }

  // create new reply fields
  var replyBox = document.createElement('div');
  replyBox.html($('#replyFieldTemplate').html());
  replyBox.id = 'newReplyBox';
  parent.append(replyBox);

  $('#replySubmit').onclick = function() { postComment(parent.children('ul')); };
}

function postComment(parent) {
  // if the parent is null, assume this isn't a reply to anything
  if (parent == null) {
    parent = $('#commentList');
  }

  // create the comment
  var comment = document.createElement('li');
  comment.html($('#commentTemplate').html());
  parent.append(comment);

  // set some variables for display and the db
  var parentid;
  var depth;

  if (parent == $('#commentList')) {
    parentid = null;
    depth = 0;
  } else {
    parentid = Number(parent.commentID());
    depth = Number(parent.depth()) + 1;
    comment.css('margin-right', (depth * 5).toString() + ' em');
  }

  // make ajax call
  $.post("../action/addComment.php", {
    title:    comment.children("h3"),
    content:  comment.children("p"),
    parentID: parentid,
    depth:    depth
  });
}
