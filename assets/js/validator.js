const button = document.getElementById('copy');
const shortUrl = document.getElementById('shortUrl').innerText;
const copyAlert = document.querySelector('.copy-alert');
copyAlert.style.display = 'none';


function copyToClipboard(text) {
  // Create a temporary textarea element
  const tempInput = document.createElement("textarea");
  tempInput.value = text;
  document.body.appendChild(tempInput);

  // Select the text
  tempInput.select();
  document.execCommand("copy");

  // Remove the temporary element
  document.body.removeChild(tempInput);
  copyAlert.style.display = 'block';
}



button.addEventListener('click', () => {
  const textToCopy = shortUrl;
  copyToClipboard(textToCopy);
});