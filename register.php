<?php $pageTitle = "สมัครสมาชิก — BICC OVEC"; ?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $pageTitle ?></title>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f8fafc;--accent:#3b82f6;--accent2:#8b5cf6;--text:#0f172a;--text2:#475569;--glass:#ffffff;--glass-border:#e2e8f0;--font:'Sarabun',sans-serif;}
body{font-family:var(--font);background:var(--bg);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px;overflow:hidden;position:relative;}
.orb{position:fixed;border-radius:50%;filter:blur(90px);opacity:0.28;animation:floatOrb 10s ease-in-out infinite;pointer-events:none;}
.orb1{width:500px;height:500px;background:#4f8ef7;top:-150px;left:-150px;}
.orb2{width:400px;height:400px;background:#7c3aed;bottom:-100px;right:-80px;animation-delay:-4s;}
@keyframes floatOrb{0%,100%{transform:translate(0,0);}50%{transform:translate(30px,-30px);}}
.wrap{position:relative;z-index:1;width:100%;max-width:520px;}
.card{background:var(--glass);border:1px solid var(--glass-border);border-radius:24px;padding:44px 40px;box-shadow:0 20px 40px rgba(0,0,0,0.08);}
.logo-wrap{text-align:center;margin-bottom:28px;}
.logo-wrap img{height:60px;margin-bottom:12px;}
.logo-title{font-size:26px;font-weight:800;background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;letter-spacing:2px;}
.logo-sub{font-size:13px;color:var(--text2);margin-top:4px;}
h2{font-size:18px;font-weight:700;color:var(--text);margin-bottom:20px;text-align:center;}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.form-group{margin-bottom:16px;}
.form-label{display:block;font-size:13px;font-weight:600;color:var(--text2);margin-bottom:7px;}
.inp-wrap{position:relative;}
.inp-wrap .ico{position:absolute;left:13px;top:50%;transform:translateY(-50%);color:var(--text2);font-size:13px;pointer-events:none;}
.inp{width:100%;background:#f1f5f9;border:1px solid #cbd5e1;border-radius:11px;padding:12px 13px 12px 40px;color:var(--text);font-family:var(--font);font-size:14.5px;transition:all .3s;outline:none;}
.inp:focus{border-color:var(--accent);background:#ffffff;box-shadow:0 0 0 3px rgba(59,130,246,0.15);}
.inp::placeholder{color:#94a3b8;}
select.inp{cursor:pointer;}
select.inp option{background:#ffffff;color:var(--text);}
.toggle-pw{position:absolute;right:11px;top:50%;transform:translateY(-50%);background:none;border:none;color:var(--text2);cursor:pointer;padding:4px;font-size:13px;}
.btn-reg{width:100%;padding:14px;background:linear-gradient(135deg,var(--accent),var(--accent2));border:none;border-radius:11px;color:#fff;font-family:var(--font);font-size:16px;font-weight:700;cursor:pointer;transition:all .3s;margin-top:4px;}
.btn-reg:hover{transform:translateY(-2px);box-shadow:0 10px 28px rgba(79,142,247,0.4);}
.btn-reg:disabled{opacity:.6;cursor:not-allowed;transform:none;}
.err-box{display:none;background:rgba(239,68,68,0.12);border:1px solid rgba(239,68,68,0.28);border-radius:10px;padding:10px 14px;color:#fca5a5;font-size:13px;margin-bottom:14px;gap:8px;}
.err-box.show{display:flex;align-items:center;}
.ok-box{display:none;background:rgba(16,185,129,0.12);border:1px solid rgba(16,185,129,0.28);border-radius:10px;padding:10px 14px;color:#6ee7b7;font-size:13px;margin-bottom:14px;gap:8px;}
.ok-box.show{display:flex;align-items:center;}
.login-link{text-align:center;margin-top:20px;font-size:14px;color:var(--text2);}
.login-link a{color:var(--accent);text-decoration:none;font-weight:700;}
.login-link a:hover{text-decoration:underline;}
.spinner{display:none;width:16px;height:16px;border:2px solid rgba(255,255,255,0.3);border-top-color:#fff;border-radius:50%;animation:spin .7s linear infinite;margin:0 auto;}
.btn-reg.loading .spinner{display:inline-block;}
.btn-reg.loading .btn-text{display:none;}
@keyframes spin{to{transform:rotate(360deg);}}
</style>
</head>
<body>
<div class="orb orb1"></div><div class="orb orb2"></div>
<div class="wrap">
  <div class="card">
    <div class="logo-wrap">
      <img src="/bicc-ovec/assets/logo.png" alt="BICC OVEC" onerror="this.style.display='none'">
      <div class="logo-title">BICC OVEC</div>
      <div class="logo-sub">ระบบบันทึกข้อมูลการไปราชการ</div>
    </div>
    <h2><i class="fas fa-user-plus" style="color:var(--accent)"></i> สมัครสมาชิก</h2>
    <div class="err-box" id="errBox"><i class="fas fa-exclamation-circle"></i><span id="errText"></span></div>
    <div class="ok-box" id="okBox"><i class="fas fa-check-circle"></i><span id="okText"></span></div>
    <form id="regForm">
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">ชื่อ-นามสกุล</label>
          <div class="inp-wrap">
            <i class="fas fa-user ico"></i>
            <input type="text" id="displayName" class="inp" placeholder="กรอกชื่อ-นามสกุล" required>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">อีเมล</label>
          <div class="inp-wrap">
            <i class="fas fa-envelope ico"></i>
            <input type="email" id="email" class="inp" placeholder="กรอกอีเมล" required>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">รหัสผ่าน</label>
          <div class="inp-wrap">
            <i class="fas fa-lock ico"></i>
            <input type="password" id="password" class="inp" placeholder="อย่างน้อย 6 ตัวอักษร" required>
            <button type="button" class="toggle-pw" onclick="tgPw('password','eye1')"><i class="fas fa-eye" id="eye1"></i></button>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">ยืนยันรหัสผ่าน</label>
          <div class="inp-wrap">
            <i class="fas fa-lock ico"></i>
            <input type="password" id="confirmPw" class="inp" placeholder="กรอกรหัสผ่านอีกครั้ง" required>
            <button type="button" class="toggle-pw" onclick="tgPw('confirmPw','eye2')"><i class="fas fa-eye" id="eye2"></i></button>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">ตำแหน่ง</label>
          <div class="inp-wrap">
            <i class="fas fa-id-badge ico"></i>
            <input type="text" id="position" class="inp" placeholder="เช่น ครูผู้ช่วย" required>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">หน่วยงาน / แผนก</label>
          <div class="inp-wrap">
            <i class="fas fa-building ico"></i>
            <input type="text" id="department" class="inp" placeholder="เช่น ฝ่ายวิชาการ" required>
          </div>
        </div>
      </div>
      <button type="submit" class="btn-reg" id="regBtn">
        <span class="btn-text"><i class="fas fa-user-plus"></i> สมัครสมาชิก</span>
        <span class="spinner"></span>
      </button>
    </form>
    <div class="login-link">มีบัญชีอยู่แล้ว? <a href="/bicc-ovec/login.php">เข้าสู่ระบบ</a></div>
  </div>
</div>

<script type="module">
import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js';
import { getAuth, createUserWithEmailAndPassword, updateProfile } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js';
import { getFirestore, doc, setDoc, serverTimestamp } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js';

const app = initializeApp({
  apiKey:"AIzaSyCrMLNBs5dOlMiPPtsnDs1LWeanHBrZloo",
  authDomain:"bicc-ovec.firebaseapp.com",
  projectId:"bicc-ovec",
  storageBucket:"bicc-ovec.firebasestorage.app",
  messagingSenderId:"803024558580",
  appId:"1:803024558580:web:d950399ff91a1c8c5501a1"
});
const auth = getAuth(app);
const db = getFirestore(app);

document.getElementById('regForm').addEventListener('submit', async e => {
  e.preventDefault();
  const btn = document.getElementById('regBtn');
  const errBox = document.getElementById('errBox');
  const okBox = document.getElementById('okBox');
  errBox.classList.remove('show'); okBox.classList.remove('show');

  const name = document.getElementById('displayName').value.trim();
  const email = document.getElementById('email').value.trim();
  const pw = document.getElementById('password').value;
  const cpw = document.getElementById('confirmPw').value;
  const pos = document.getElementById('position').value.trim();
  const dept = document.getElementById('department').value.trim();

  if(pw !== cpw){
    errBox.classList.add('show');
    document.getElementById('errText').textContent = 'รหัสผ่านไม่ตรงกัน';
    return;
  }
  btn.classList.add('loading'); btn.disabled = true;
  try {
    const cred = await createUserWithEmailAndPassword(auth, email, pw);
    await updateProfile(cred.user, { displayName: name });
    await setDoc(doc(db,'users',cred.user.uid), {
      displayName: name, email, position: pos, department: dept,
      role: 'user', createdAt: serverTimestamp()
    });
    okBox.classList.add('show');
    document.getElementById('okText').textContent = 'สมัครสมาชิกสำเร็จ! กำลังพาไปหน้าหลัก...';
    setTimeout(() => window.location.href = '/bicc-ovec/user/dashboard.php', 1500);
  } catch(err) {
    btn.classList.remove('loading'); btn.disabled = false;
    errBox.classList.add('show');
    const map = {
      'auth/email-already-in-use':'อีเมลนี้ถูกใช้งานแล้ว',
      'auth/weak-password':'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร',
      'auth/invalid-email':'รูปแบบอีเมลไม่ถูกต้อง'
    };
    document.getElementById('errText').textContent = map[err.code] || 'เกิดข้อผิดพลาด';
  }
});

window.tgPw = function(id, ico){
  const el = document.getElementById(id);
  const ic = document.getElementById(ico);
  el.type = el.type==='password' ? 'text' : 'password';
  ic.className = el.type==='password' ? 'fas fa-eye' : 'fas fa-eye-slash';
};
</script>
</body>
</html>
