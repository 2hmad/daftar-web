const loading = document.querySelector(".loading");
const allA = document.querySelectorAll("a");
allA.forEach(link => {
  if (link.getAttribute("static") === "true") {
    return 
  }
  link.addEventListener("click", (e) => {
    console.log('test')
    e.preventDefault();
    change(link)
  })
})
function change(url) {
  loading.style.display = "block";
  let width = 0;
  const loadingInterval = setInterval(() => {
    width += 2;
    loading.style.width = width + "%";
    if (width === 100) {
      clearInterval(loadingInterval);
    }
  }, 20);
  axios.get(url).then((res) => {
    document.open("text/html", "html");
    document.write(res.data);
    document.close();
  });
}