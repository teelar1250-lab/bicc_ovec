<?php $pageTitle = "เข้าสู่ระบบ — BICC OVEC"; ?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $pageTitle ?></title>
<meta name="description" content="ระบบบันทึกข้อมูลการไปราชการ วิทยาลัย BICC OVEC">
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#f8fafc;--accent:#3b82f6;--accent2:#8b5cf6;--teal:#0ea5e9;
  --text:#0f172a;--text2:#475569;--glass:#ffffff;
  --glass-border:#e2e8f0;--danger:#ef4444;--font:'Sarabun',sans-serif;
}
body{font-family:var(--font);background:var(--bg);min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;position:relative;}
.bg-orbs{position:fixed;inset:0;pointer-events:none;z-index:0;}
.orb{position:absolute;border-radius:50%;filter:blur(90px);opacity:0.3;animation:floatOrb 10s ease-in-out infinite;}
.orb1{width:500px;height:500px;background:#4f8ef7;top:-150px;left:-150px;animation-delay:0s;}
.orb2{width:400px;height:400px;background:#7c3aed;bottom:-100px;right:-80px;animation-delay:-4s;}
.orb3{width:300px;height:300px;background:#06b6d4;top:55%;left:55%;animation-delay:-7s;}
@keyframes floatOrb{0%,100%{transform:translate(0,0) scale(1);}33%{transform:translate(40px,-40px) scale(1.07);}66%{transform:translate(-25px,25px) scale(0.93);}}
.login-wrap{position:relative;z-index:1;width:100%;max-width:440px;padding:20px;}
.login-card{background:var(--glass);border:1px solid var(--glass-border);border-radius:24px;padding:48px 40px;box-shadow:0 30px 60px rgba(0,0,0,0.08);}
.logo-wrap{text-align:center;margin-bottom:36px;}
.logo-wrap img{height:72px;margin-bottom:14px;}
.logo-title{font-size:30px;font-weight:800;background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;letter-spacing:3px;}
.logo-sub{font-size:13px;color:var(--text2);margin-top:6px;line-height:1.5;}
.form-group{margin-bottom:20px;}
.form-label{display:block;font-size:13.5px;font-weight:600;color:var(--text2);margin-bottom:8px;}
.inp-wrap{position:relative;}
.inp-wrap .ico{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--text2);font-size:14px;pointer-events:none;}
.inp{width:100%;background:#f1f5f9;border:1px solid #cbd5e1;border-radius:12px;padding:13px 14px 13px 42px;color:var(--text);font-family:var(--font);font-size:15px;transition:all .3s;outline:none;}
.inp:focus{border-color:var(--accent);background:#ffffff;box-shadow:0 0 0 3px rgba(59,130,246,0.15);}
.inp::placeholder{color:#94a3b8;}
.toggle-pw{position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:var(--text2);cursor:pointer;padding:5px;font-size:14px;}
.toggle-pw:hover{color:var(--text);}
.btn-login{width:100%;padding:15px;background:linear-gradient(135deg,var(--accent),var(--accent2));border:none;border-radius:12px;color:#fff;font-family:var(--font);font-size:16px;font-weight:700;cursor:pointer;transition:all .3s;margin-top:8px;letter-spacing:.5px;}
.btn-login:hover{transform:translateY(-2px);box-shadow:0 12px 32px rgba(79,142,247,0.45);}
.btn-login:disabled{opacity:.6;cursor:not-allowed;transform:none;box-shadow:none;}
.spinner{display:none;width:18px;height:18px;border:2.5px solid rgba(255,255,255,0.3);border-top-color:#fff;border-radius:50%;animation:spin .7s linear infinite;margin:0 auto;}
.btn-login.loading .spinner{display:inline-block;}
.btn-login.loading .btn-text{display:none;}
@keyframes spin{to{transform:rotate(360deg);}}
.err-box{display:none;background:rgba(239,68,68,0.12);border:1px solid rgba(239,68,68,0.28);border-radius:10px;padding:11px 14px;color:#fca5a5;font-size:13.5px;margin-bottom:18px;gap:9px;}
.err-box.show{display:flex;align-items:center;}
.reg-link{text-align:center;margin-top:24px;font-size:14px;color:var(--text2);}
.reg-link a{color:var(--accent);text-decoration:none;font-weight:700;}
.reg-link a:hover{text-decoration:underline;}
</style>
</head>
<body>
<div class="bg-orbs">
  <div class="orb orb1"></div><div class="orb orb2"></div><div class="orb orb3"></div>
</div>
<div class="login-wrap">
  <div class="login-card">
    <div class="logo-wrap">
      <img src="/bicc-ovec/assets/logo.png" alt="BICC OVEC" onerror="this.style.display='none'">
      <div class="logo-title">BICC OVEC</div>
      <div class="logo-sub">ระบบบันทึกข้อมูลการไปราชการ<br>วิทยาลัยอาชีวศึกษา</div>
    </div>
    <div class="err-box" id="errBox"><i class="fas fa-exclamation-circle"></i><span id="errText"></span></div>
    <form id="loginForm">
      <div class="form-group">
        <label class="form-label">อีเมล</label>
        <div class="inp-wrap">
          <i class="fas fa-envelope ico"></i>
          <input type="email" id="email" class="inp" placeholder="กรอกอีเมลของท่าน" required>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">รหัสผ่าน</label>
        <div class="inp-wrap">
          <i class="fas fa-lock ico"></i>
          <input type="password" id="password" class="inp" placeholder="กรอกรหัสผ่าน" required>
          <button type="button" class="toggle-pw" onclick="togglePw()"><i class="fas fa-eye" id="eyeIco"></i></button>
        </div>
      </div>
      <button type="submit" class="btn-login" id="loginBtn">
        <span class="btn-text"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</span>
        <span class="spinner"></span>
      </button>
    </form>
    <div class="reg-link">ยังไม่มีบัญชี? <a href="/bicc-ovec/register.php">สมัครสมาชิก</a></div>
  </div>
</div>

<script type="module">
import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js';
import { getAuth, signInWithEmailAndPassword, onAuthStateChanged } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js';
import { getFirestore, doc, getDoc } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js';

const firebaseConfig = {
  apiKey:"AIzaSyCrMLNBs5dOlMiPPtsnDs1LWeanHBrZloo",
  authDomain:"bicc-ovec.firebaseapp.com",
  projectId:"bicc-ovec",
  storageBucket:"bicc-ovec.firebasestorage.app",
  messagingSenderId:"803024558580",
  appId:"1:803024558580:web:d950399ff91a1c8c5501a1",
  measurementId:"G-CVS9PBKWW3"
};
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const db = getFirestore(app);

function redirect(role){ window.location.href = role==='admin' ? '/bicc-ovec/admin/dashboard.php' : '/bicc-ovec/user/dashboard.php'; }

onAuthStateChanged(auth, async user => {
  if(!user) return;
  try {
    const snap = await getDoc(doc(db,'users',user.uid));
    if(snap.exists()) redirect(snap.data().role);
  } catch(e){}
});

document.getElementById('loginForm').addEventListener('submit', async e => {
  e.preventDefault();
  const btn = document.getElementById('loginBtn');
  const errBox = document.getElementById('errBox');
  btn.classList.add('loading'); btn.disabled = true;
  errBox.classList.remove('show');
  try {
    const cred = await signInWithEmailAndPassword(auth, document.getElementById('email').value, document.getElementById('password').value);
    const snap = await getDoc(doc(db,'users',cred.user.uid));
    redirect(snap.data()?.role || 'user');
  } catch(err) {
    btn.classList.remove('loading'); btn.disabled = false;
    errBox.classList.add('show');
    const map = {
      'auth/invalid-credential':'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
      'auth/user-not-found':'ไม่พบบัญชีผู้ใช้นี้',
      'auth/wrong-password':'รหัสผ่านไม่ถูกต้อง',
      'auth/too-many-requests':'ลองใหม่ภายหลัง (พยายามมากเกินไป)',
      'auth/invalid-email':'รูปแบบอีเมลไม่ถูกต้อง'
    };
    document.getElementById('errText').textContent = map[err.code] || 'เกิดข้อผิดพลาด กรุณาลองใหม่';
  }
});

window.togglePw = function(){
  const pw = document.getElementById('password');
  const ico = document.getElementById('eyeIco');
  pw.type = pw.type==='password' ? 'text' : 'password';
  ico.className = pw.type==='password' ? 'fas fa-eye' : 'fas fa-eye-slash';
};
</script>
</body>
</html>
