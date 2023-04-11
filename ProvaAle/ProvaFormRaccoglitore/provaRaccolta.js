function scrollaPaginaDonatore() {
  const container = document.querySelector('#containerShelf'); 
  const yOffset = container.getBoundingClientRect().top + window.pageYOffset;
  window.scrollTo({
    top: yOffset,
    behavior: 'smooth'
  });
}