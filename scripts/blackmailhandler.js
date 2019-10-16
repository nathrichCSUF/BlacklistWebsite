/*
This file will initialize an object that is marked with user's email Address
user will be able to make post based on there requirement
*/
(function (window) {
  "use strict";
  var App = window.App || {};

  function BlackMailPostAccount(posterEmail, db) {
    this.posterEmail = posterEmail;
    this.db = db;
  }

  BlackMailPostAccount.prototype.createPost = function (post) {
    console.log("Adding post for " + post.postID);
    this.db.add(post.postID, post);
  };

  BlackMailPostAccount.prototype.satisfiedPost = function (postID) {
    console.log("The demands from " + postID + " are satisfied");
    this.db.remove(postID);
  };

  BlackMailPostAccount.prototype.printPost = function (){
    var postIDArray = Object.keys(this.db.getAll());

    console.log("Email Address " + this.posterEmail + " has posted:");
    postIDArray.forEach(function (id) {
      console.log(this.db.get(id));
    }.bind(this));
  };

  App.BlackMailPostAccount = BlackMailPostAccount;
  window.App = App;
})(window);
