function login() {
    const fName = document.getElementById('fName').value;
    const eMail = document.getElementById('eMail').value;
    const uAddress = document.getElementById('uAddress').value;

    if (fName == '' || eMail == '' || uAddress == '') {
        alert('Anda harus mengisi data dengan lengkap !');
    } else {
        alert('Hello World')
    }
}