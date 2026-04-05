<?php $p = "Admin Travel Detail - BICC OVEC"; ?>
<!DOCTYPE html><html lang="th"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=$p?></title>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f8fafc;--sb:#ffffff;--card:#ffffff;--ch:#f1f5f9;--a:#3b82f6;--a2:#8b5cf6;--teal:#0ea5e9;--t:#0f172a;--t2:#475569;--b:#e2e8f0;--ok:#10b981;--warn:#f59e0b;--err:#ef4444;--sw:260px;--f:'Sarabun',sans-serif}
body{font-family:var(--f);background:var(--bg);color:var(--t);min-height:100vh;display:flex}
.sb{width:var(--sw);min-height:100vh;background:var(--sb);border-right:1px solid var(--b);position:fixed;left:0;top:0;display:flex;flex-direction:column;z-index:100;box-shadow:1px 0 15px rgba(0,0,0,0.03)}
.sb-logo{padding:22px 20px;border-bottom:1px solid var(--b);display:flex;align-items:center;gap:12px}
.sb-logo img{height:38px}
.t1{font-size:17px;font-weight:800;background:linear-gradient(135deg,#4f8ef7,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;letter-spacing:1.5px}
.abadge{font-size:9.5px;background:linear-gradient(135deg,#f59e0b,#ef4444);color:#fff;padding:2px 7px;border-radius:20px;font-weight:700}
.sb-nav{flex:1;padding:14px 10px}
.nl{font-size:10.5px;font-weight:700;color:var(--t2);text-transform:uppercase;letter-spacing:1.2px;padding:10px 12px 6px}
.na{display:flex;align-items:center;gap:11px;padding:10px 13px;border-radius:10px;color:var(--t2);text-decoration:none;font-size:14px;font-weight:500;transition:all .2s;margin-bottom:2px;cursor:pointer;border:none;background:none;width:100%}
.na:hover{background:var(--ch);color:var(--t)}
.na.act{background:linear-gradient(135deg,rgba(79,142,247,.18),rgba(124,58,237,.18));color:var(--a);border:1px solid rgba(79,142,247,.28)}
.na i{width:18px;text-align:center;font-size:15px}
.sb-foot{padding:14px 18px;border-top:1px solid var(--b);display:flex;align-items:center;gap:10px}
.av{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#ef4444);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;color:#fff;flex-shrink:0}
.un{font-size:13px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.ur{font-size:10.5px;color:#fbbf24}
.lb{background:none;border:none;color:var(--t2);cursor:pointer;padding:5px;font-size:15px;margin-left:auto}
.lb:hover{color:var(--err)}
.main{margin-left:var(--sw);flex:1;padding:30px 32px;background:radial-gradient(ellipse at 10% 10%,rgba(59,130,246,.04) 0%,transparent 50%),var(--bg)}
.ph{display:flex;align-items:center;gap:14px;margin-bottom:26px;flex-wrap:wrap}
.bb{display:flex;align-items:center;justify-content:center;width:38px;height:38px;background:var(--card);border:1px solid var(--b);border-radius:10px;color:var(--t2);text-decoration:none;font-size:15px}
.bb:hover{background:var(--ch);color:var(--t)}
.pt{font-size:22px;font-weight:700;flex:1}
.card{background:var(--card);border:1px solid var(--b);border-radius:16px;padding:24px;box-shadow:0 10px 25px -5px rgba(0,0,0,0.04);margin-bottom:20px}
.st{font-size:14px;font-weight:700;color:var(--a);margin-bottom:16px;padding-bottom:10px;border-bottom:1px solid var(--b);display:flex;align-items:center;gap:8px}
.dg{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
.di .l{font-size:12px;font-weight:600;color:var(--t2);margin-bottom:5px;text-transform:uppercase;letter-spacing:.4px}
.di .v{font-size:14.5px;color:var(--t);font-weight:500;line-height:1.5}
.di.f{grid-column:1/-1}
.am{background:#f8fafc;border:1px solid var(--b);border-radius:12px;padding:16px 20px;display:flex;align-items:center;justify-content:space-between;margin-bottom:14px}
.am .av2{font-size:26px;font-weight:800;color:var(--a)}
.am .al{font-size:13px;color:var(--t2)}
.bdg{display:inline-flex;align-items:center;gap:5px;padding:6px 14px;border-radius:20px;font-size:13px;font-weight:700}
.bp{background:rgba(245,158,11,.14);color:#fbbf24;border:1px solid rgba(245,158,11,.28)}
.ba{background:rgba(16,185,129,.14);color:#34d399;border:1px solid rgba(16,185,129,.28)}
.br{background:rgba(239,68,68,.14);color:#f87171;border:1px solid rgba(239,68,68,.28)}
.ar{display:flex;gap:12px;margin-top:6px;flex-wrap:wrap}
.btn{display:inline-flex;align-items:center;gap:7px;padding:12px 22px;border-radius:11px;font-family:var(--f);font-size:15px;font-weight:700;cursor:pointer;border:none;transition:all .2s;text-decoration:none}
.btnok{background:linear-gradient(135deg,#059669,#10b981);color:#fff}
.btnok:hover{transform:translateY(-1px);box-shadow:0 8px 22px rgba(16,185,129,.4)}
.btnno{background:linear-gradient(135deg,#dc2626,#ef4444);color:#fff}
.btnno:hover{transform:translateY(-1px);box-shadow:0 8px 22px rgba(239,68,68,.4)}
.btnbk{background:transparent;border:1px solid var(--b);color:var(--t2)}
.btnbk:hover{background:var(--ch);color:var(--t)}
.btn:disabled{opacity:.5;cursor:not-allowed;transform:none}
.fi{background:#f8fafc;border:1px solid var(--b);border-radius:12px;padding:13px 16px;display:flex;align-items:center;gap:12px;margin-bottom:10px}
.fic{width:40px;height:40px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0}
.fic.img{background:rgba(16,185,129,.15);color:#34d399}
.fic.pdf{background:rgba(239,68,68,.15);color:#f87171}
.bsm{display:inline-flex;align-items:center;gap:5px;padding:7px 13px;border-radius:8px;font-family:var(--f);font-size:12.5px;font-weight:600;cursor:pointer;border:none;background:rgba(79,142,247,.15);color:#93c5fd;border:1px solid rgba(79,142,247,.28)}
.bsm:hover{background:rgba(79,142,247,.25)}
.es{text-align:center;padding:28px;color:var(--t2)}
.es i{font-size:32px;margin-bottom:10px;opacity:.3}
.alert{display:flex;align-items:center;gap:9px;padding:12px 16px;border-radius:10px;font-size:14px;margin-bottom:14px}
.as{background:rgba(16,185,129,.12);border:1px solid rgba(16,185,129,.28);color:#6ee7b7}
.ae{background:rgba(239,68,68,.12);border:1px solid rgba(239,68,68,.28);color:#fca5a5}
.mo{display:none;position:fixed;inset:0;background:rgba(0,0,0,.85);z-index:999;align-items:center;justify-content:center;padding:20px}
.mo.show{display:flex}
.mb{background:#ffffff;border:1px solid var(--b);border-radius:16px;max-width:900px;width:100%;max-height:90vh;display:flex;flex-direction:column;overflow:hidden}
.mh{display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border-bottom:1px solid var(--b)}
.mc{background:none;border:none;color:var(--t2);cursor:pointer;font-size:18px;padding:4px}
.mbody{flex:1;overflow:auto;padding:16px}
.mbody img{max-width:100%;border-radius:10px}
.mbody iframe{width:100%;height:65vh;border:none;border-radius:8px}
.lo{position:fixed;inset:0;background:var(--bg);display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:998;gap:16px}
.sp{width:44px;height:44px;border:3px solid rgba(79,142,247,.2);border-top-color:var(--a);border-radius:50%;animation:spin .8s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
</style></head><body>
<div class="lo" id="lo"><div class="sp"></div><p style="color:var(--t2)">กำลังโหลด...</p></div>
<aside class="sb">
  <div class="sb-logo"><img src="/bicc-ovec/assets/logo.png" onerror="this.style.display='none'"><div><div class="t1">BICC OVEC</div><div class="abadge">ADMIN</div></div></div>
  <nav class="sb-nav">
    <div class="nl">ผู้ดูแลระบบ</div>
    <a class="na" href="/bicc-ovec/admin/dashboard.php"><i class="fas fa-chart-pie"></i> Dashboard</a>
    <a class="na" href="/bicc-ovec/admin/users.php"><i class="fas fa-users"></i> จัดการผู้ใช้</a>
    <div class="nl" style="margin-top:8px">บัญชี</div>
    <button class="na" onclick="doLogout()"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
  </nav>
  <div class="sb-foot"><div class="av" id="sba">A</div><div style="flex:1;min-width:0"><div class="un" id="sbn">Admin</div><div class="ur">ผู้ดูแลระบบ</div></div><button class="lb" onclick="doLogout()"><i class="fas fa-power-off"></i></button></div>
</aside>
<main class="main">
  <div class="ph"><a href="/bicc-ovec/admin/dashboard.php" class="bb"><i class="fas fa-arrow-left"></i></a><div class="pt">🔍 รายละเอียดการไปราชการ</div><span id="sbdg"></span></div>
  <div id="aa"></div>
  <div class="card" id="dc" style="display:none">
    <div class="st"><i class="fas fa-user"></i> ข้อมูลผู้ไปราชการ</div>
    <div class="dg">
      <div class="di"><div class="l">ที่รายการ</div><div class="v" id="dI">—</div></div>
      <div class="di"><div class="l">ชื่อผู้ไปราชการ</div><div class="v" id="dN">—</div></div>
      <div class="di"><div class="l">ตำแหน่ง</div><div class="v" id="dP">—</div></div>
      <div class="di"><div class="l">หน่วยงาน</div><div class="v" id="dDp">—</div></div>
      <div class="di"><div class="l">ประเภท</div><div class="v" id="dT">—</div></div>
      <div class="di"><div class="l">บันทึกเมื่อ</div><div class="v" id="dC">—</div></div>
      <div class="di f"><div class="l">เรื่องที่ไป</div><div class="v" id="dS">—</div></div>
      <div class="di f"><div class="l">สถานที่</div><div class="v" id="dL">—</div></div>
    </div>
    <div style="height:18px"></div>
    <div class="st"><i class="fas fa-calendar-alt"></i> วันที่และงบประมาณ</div>
    <div class="dg" style="margin-bottom:18px">
      <div class="di"><div class="l">วันที่ไป</div><div class="v" id="dSt">—</div></div>
      <div class="di"><div class="l">วันที่กลับ</div><div class="v" id="dEn">—</div></div>
      <div class="di"><div class="l">จำนวนวัน</div><div class="v" id="dDy">—</div></div>
    </div>
    <div class="am"><div><div class="al">จำนวนเงินที่เบิก</div><div class="av2" id="dA">—</div></div><div style="text-align:right"><div class="al">แหล่งเงิน</div><div style="font-size:15px;font-weight:700;color:var(--t);margin-top:5px" id="dF">—</div></div></div>
    <div class="dg"><div class="di f"><div class="l">หมายเหตุ</div><div class="v" id="dR">—</div></div></div>
  </div>
  <div class="card" id="ac" style="display:none">
    <div class="st"><i class="fas fa-clipboard-check" style="color:var(--ok)"></i> การอนุมัติ</div>
    <p style="color:var(--t2);font-size:14px;margin-bottom:18px">กรุณาตรวจสอบข้อมูลก่อนกดอนุมัติหรือปฏิเสธ</p>
    <div class="ar">
      <button class="btn btnok" id="bA" onclick="ss('approved')"><i class="fas fa-check-circle"></i> อนุมัติ</button>
      <button class="btn btnno" id="bR" onclick="ss('rejected')"><i class="fas fa-times-circle"></i> ปฏิเสธ</button>
      <a href="/bicc-ovec/admin/dashboard.php" class="btn btnbk"><i class="fas fa-arrow-left"></i> กลับ</a>
    </div>
  </div>
  <div class="card">
    <div class="st"><i class="fas fa-paperclip" style="color:var(--teal)"></i> เอกสารที่อัปโหลด (<span id="dCnt">0</span> ไฟล์)</div>
    <div id="dl"><div class="es"><i class="fas fa-folder-open"></i><p>ยังไม่มีไฟล์</p></div></div>
  </div>
</main>
<div class="mo" id="pm"><div class="mb"><div class="mh"><span id="pt2" style="font-size:15px;font-weight:700"></span><button class="mc" onclick="cp()"><i class="fas fa-times"></i></button></div><div class="mbody" id="pb"></div></div></div>
<script type="module">
import{initializeApp}from'https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js';
import{getAuth,onAuthStateChanged,signOut}from'https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js';
import{getFirestore,doc,getDoc,updateDoc,collection,getDocs,serverTimestamp}from'https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js';
const app=initializeApp({apiKey:"AIzaSyCrMLNBs5dOlMiPPtsnDs1LWeanHBrZloo",authDomain:"bicc-ovec.firebaseapp.com",projectId:"bicc-ovec",storageBucket:"bicc-ovec.firebasestorage.app",messagingSenderId:"803024558580",appId:"1:803024558580:web:d950399ff91a1c8c5501a1"});
const auth=getAuth(app),db=getFirestore(app),tid=new URLSearchParams(location.search).get('id');
if(!tid)location.href='/bicc-ovec/admin/dashboard.php';
onAuthStateChanged(auth,async u=>{
  if(!u){location.href='/bicc-ovec/login.php';return}
  const up=await getDoc(doc(db,'users',u.uid));
  if(!up.exists()||up.data().role!=='admin'){location.href='/bicc-ovec/user/dashboard.php';return}
  const ud=up.data();
  document.getElementById('sbn').textContent=ud.displayName||u.email;
  document.getElementById('sba').textContent=(ud.displayName||'A').charAt(0).toUpperCase();
  const ts=await getDoc(doc(db,'travels',tid));
  if(!ts.exists()){location.href='/bicc-ovec/admin/dashboard.php';return}
  rd(ts.data());
  const ds=await getDocs(collection(db,'travels',tid,'documents'));
  rdocs(ds.docs.map(d=>({id:d.id,...d.data()})));
  document.getElementById('lo').style.display='none';
});
function rd(d){
  document.getElementById('dc').style.display='block';document.getElementById('ac').style.display='block';
  const bm={pending:'<span class="bdg bp"><i class="fas fa-clock"></i> รออนุมัติ</span>',approved:'<span class="bdg ba"><i class="fas fa-check"></i> อนุมัติแล้ว</span>',rejected:'<span class="bdg br"><i class="fas fa-times"></i> ปฏิเสธ</span>'};
  document.getElementById('sbdg').innerHTML=bm[d.status]||'';
  if(d.status!=='pending'){document.getElementById('bA').disabled=true;document.getElementById('bR').disabled=true;}
  document.getElementById('dI').textContent=d.itemNumber||'-';document.getElementById('dN').textContent=d.travelerName||'-';
  document.getElementById('dP').textContent=d.position||'-';document.getElementById('dDp').textContent=d.department||'-';
  document.getElementById('dT').textContent=d.travelType||'-';document.getElementById('dS').textContent=d.subject||'-';
  document.getElementById('dL').textContent=d.location||'-';document.getElementById('dSt').textContent=d.startDate||'-';
  document.getElementById('dEn').textContent=d.endDate||'-';document.getElementById('dR').textContent=d.remark||'—';
  document.getElementById('dC').textContent=d.createdAt?.toDate?d.createdAt.toDate().toLocaleDateString('th-TH'):'-';
  if(d.startDate&&d.endDate)document.getElementById('dDy').textContent=Math.round((new Date(d.endDate)-new Date(d.startDate))/86400000+1)+' วัน';
  document.getElementById('dA').textContent='฿'+Number(d.totalAmount||0).toLocaleString('th-TH',{minimumFractionDigits:2});
  document.getElementById('dF').textContent=d.fundSource==='college'?'จากวิทยาลัย':'จากโครงการ'+(d.fundDetail?' ('+d.fundDetail+')':'');
}
function rdocs(docs){
  document.getElementById('dCnt').textContent=docs.length;
  if(!docs.length)return;
  document.getElementById('dl').innerHTML=docs.map(d=>{
    const il = d.fileType==='link'||(d.fileUrl&&d.fileUrl.includes('drive.google.com'));
    const ip = !il&&(d.fileType==='application/pdf'||d.fileName?.endsWith('.pdf'));
    const dt = d.uploadedAt?.toDate?d.uploadedAt.toDate().toLocaleDateString('th-TH',{year:'numeric',month:'short',day:'numeric'}):'-';
    const icon = il?'fa-link':(ip?'fa-file-pdf':'fa-file-image');
    return`<div class="fi"><div class="fic ${il?'img':(ip?'pdf':'img')}"><i class="fas ${icon}"></i></div><div style="flex:1;min-width:0"><div style="font-size:13.5px;font-weight:600;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">${d.fileName||'-'}</div><div style="font-size:12px;color:var(--t2)">${dt}</div></div><button class="bsm" onclick="pv('${d.fileUrl}','${d.fileName}','${il?'link':(ip?'pdf':'img')}')"><i class="fas fa-eye"></i> ดู</button></div>`;
  }).join('');
}
window.ss=async function(st){
  if(!confirm(st==='approved'?'ยืนยันการอนุมัติ?':'ยืนยันการปฏิเสธ?'))return;
  document.getElementById('bA').disabled=true;document.getElementById('bR').disabled=true;
  try{
    await updateDoc(doc(db,'travels',tid),{status:st,updatedAt:serverTimestamp()});
    const bm={approved:'<span class="bdg ba"><i class="fas fa-check"></i> อนุมัติแล้ว</span>',rejected:'<span class="bdg br"><i class="fas fa-times"></i> ปฏิเสธ</span>'};
    document.getElementById('sbdg').innerHTML=bm[st];
    const a=document.createElement('div');a.className='alert as';a.innerHTML=`<i class="fas fa-check-circle"></i>${st==='approved'?'อนุมัติเรียบร้อย!':'ปฏิเสธเรียบร้อย!'}`;document.getElementById('aa').appendChild(a);
  }catch(e){const a=document.createElement('div');a.className='alert ae';a.innerHTML='<i class="fas fa-exclamation-circle"></i>เกิดข้อผิดพลาด';document.getElementById('aa').appendChild(a);}
};
window.pv=function(url,name,type){
  let eUrl=url;
  if(eUrl.includes('drive.google.com/file/d/')){ eUrl=eUrl.replace(/\/view.*?$/, '/preview'); }
  document.getElementById('pt2').textContent=name;
  if(type==='pdf'||type==='link'){ document.getElementById('pb').innerHTML=`<iframe src="${eUrl}"></iframe>`; }
  else{ document.getElementById('pb').innerHTML=`<img src="${eUrl}">`; }
  document.getElementById('pm').classList.add('show');
};
window.cp=function(){document.getElementById('pm').classList.remove('show');};
window.doLogout=async function(){await signOut(auth);location.href='/bicc-ovec/login.php';};
</script></body></html>
