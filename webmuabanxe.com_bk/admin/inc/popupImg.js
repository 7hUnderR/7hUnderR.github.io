var ppimgNW;
function popupImage(src, note, title, css, border) {
  if (border==null) border = 0;
  if (note==null) note = '';
  if (ppimgNW != null) ppimgNW.close();

  ppimgNW = window.open('','POPUPIMAGE','width=1,height=1,scrollbars=no,');
  var doc = ppimgNW.document;
  doc.write('<html>');
  doc.write('<head>');

  if (title!=null) doc.write('<title>'+ title +'</title>');
  doc.write('<style> body {'+css+'} #ppImgText{'+ css +'} #ppImg{cursor:hand}</style></head>');
  doc.write('<body leftmargin="0" topmargin="' + border + '" onload="doResize();">');
  doc.write('<div align="center">');
  doc.write('<img src="' + src + '" id="ppImg" onclick="self.close();" title="Close">');
  doc.write('</div>');
  doc.write('<div style="height:1; width:' + border + '; font-size:4pt;">');
  doc.write('</div>');
  doc.write('<div id="ppImgText" align="center">');
  doc.write(note);
  doc.write('</div>');
  doc.write('</body>');
  doc.write('</html>');

  doc.write('<' + 'script>');
  doc.write('function doResize() {');
  doc.write('  try { var imgW = ppImg.width, imgH = ppImg.height;');     
  doc.write('  window.resizeTo(imgW + 8 +' + border*2 +', imgH + ppImgText.offsetHeight + 26 + '+ border*2 +');');
  doc.write('  setTimeout(\'doResize()\', 1000); } catch (ex) {} ');
  doc.write('}');
  doc.write('doResize(); ');
  doc.write('</' + 'script>');
}