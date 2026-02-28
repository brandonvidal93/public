/**
 * Moira Custom Scripts
 */

window.onscroll = function() {
  let scrollPercent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;

  if (scrollPercent > 50) {
    console.log("%c Web optimizada por Brandon Vidal Jaramillo", "color: #B65835; font-weight: bold; font-size: 14px;");
    
    window.onscroll = null;
  }
}