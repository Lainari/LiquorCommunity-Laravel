import { checkDuplicate as checkDuplicateService } from '../service/signup/index.js';
import { sendData } from '../service/account/edit.js';

window.checkAge = checkAge;
window.checkDuplicate = checkDuplicate;

window.onload = function() {
    var userIdBtn = document.querySelector('#user_id_btn');
    var nicknameBtn = document.querySelector('#nickname_btn');

    if(userIdBtn){
        userIdBtn.addEventListener('click', function() {
            checkDuplicate('user_id');
        });
    }
    
    if(nicknameBtn){
        nicknameBtn.addEventListener('click', function() {
            checkDuplicate('nickname');
        });
    }
};

function checkAge() {
    console.log('CheckAge')
    var birthday = new Date(document.querySelector('#birthday').value);
    var today = new Date();
    var age = today.getFullYear() - birthday.getFullYear();
    var m = today.getMonth() - birthday.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) {
        age--;
    }
    if (age < 19) {
        alert("만 19세 미만은 이용이 불가능합니다.");
        document.querySelector('#birthday').value = '';
    }
}

function checkDuplicate(type) {
    console.log('CheckDuplicate')
    var value;
    if (type == 'user_id') {
        value = document.querySelector('#user_id').value;
    } else if (type == 'nickname') {
        value = document.querySelector('#nickname').value;
    }

    checkDuplicateService(type, value).then(function(data) {
        console.log('CheckDuplicateService')
        console.log(data)

        if(value==='' && type === 'user_id'){
            alert('아이디를 입력해주세요');
        }else if(value==='' && type === 'nickname'){
            alert('닉네임을 입력해주세요');
        }

        if (data.exists && type === 'user_id') {
            alert('이미 존재하는 아이디입니다.');
            document.querySelector('#' + type + '_check').value = "0";
        } else if (data.exists && type === 'nickname') {
            alert('이미 존재하는 닉네임입니다.');
            document.querySelector('#' + type + '_check').value = "0";
        } 

        if(!data.exists && value !=='' && type === 'user_id'){
            alert('사용 가능한 아이디 입니다!');
            document.querySelector('#' + type + '_check').value = "1";
        } else if(!data.exists &&  value !=='' && type === 'nickname'){
            alert('사용 가능한 닉네임 입니다!');
            document.querySelector('#' + type + '_check').value = "1";
        }
    });
}

document.querySelector('.form-main').addEventListener('submit', function(event) {
    event.preventDefault(); // 기본 submit 이벤트를 막음

    var userIdCheck = document.querySelector('#user_id_check');
    var nicknameCheck = document.querySelector('#nickname_check');

    if (userIdCheck && userIdCheck.value == "0") {
        alert('아이디 중복체크를 하세요');
    }
    else if (nicknameCheck && nicknameCheck.value == "0") {
        alert('닉네임 중복체크를 하세요');
    }
    else {
        alert('회원가입 성공!');
        event.target.submit(); 
        // 폼 검증이 성공하면, 기본 submit 이벤트를 실행
    }
});

document.querySelector('#edit').addEventListener('click', function(event) {
    event.preventDefault();

    var nicknameCheck = document.querySelector('#nickname_check');

    if (nicknameCheck && nicknameCheck.value == "0") {
        alert('닉네임 중복체크를 하세요');
    }
    else {
        var nickname = document.querySelector('#nickname').value;
        var birthday = document.querySelector('#birthday').value;
        
        sendData(nickname, birthday);
    }
});