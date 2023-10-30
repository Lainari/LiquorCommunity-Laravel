function checkAge() {
    var birthday = new Date(document.getElementById('birthday').value);
    var today = new Date();
    var age = today.getFullYear() - birthday.getFullYear();
    var m = today.getMonth() - birthday.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) {
        age--;
    }
    if (age < 19) {
        alert("만 19세 미만은 회원가입이 불가능합니다.");
        return false;
    }
    return true;
}
