firebase.auth().onAuthStateChanged(function(user){
     // if user is logged in

if (user){
  console.log("HIIIIII"); 
  const a = document.createElement("a");
  const b = document.createElement("a")
  const c = document.createElement("a")
  const d = document.createElement("a")
   c.setAttribute("href", "leaning.html")
    c. innerText = "learn something new" 
  c.setAttribute("href", "games.html")
    c. innerText = "Play Games" 
  b.setAttribute("href", "social.html")
  b.innerText = "Posts"
  a.setAttribute("href", "chat.html")
  a.innerText = "Chatroom";
    
   
  select.append(a)
  select.append(b)
  select.append(c)
  select.append(d)
   
}
})
