<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<style>
.progress{ margin-top: 4rem; position: relative; left:50%; transform:translate(-50%); width:80%; display: flex; }
.progress-track{ position: absolute; top: 0.5rem; width: 100%; height: 0.5rem;background-color: lightgrey; z-index: -1; }
.progress-step{ position: relative; width: 100%; font-size: 0.7rem; text-align: center; }
.progress-step::before{ content: "\2713"; display: flex; place-content: center center; margin: 0 auto; margin-bottom: 1rem; width: 1rem; height: 1rem; background: white; border: 0.25rem solid lightgrey; border-radius: 100%; color: white;}
.progress-step::after{content:""; position: absolute; top:.5rem; left: 50%; width: 0%; transition: width 1s ease-in; height: 5px; background: lightgrey; z-index: -1; }
.is-active{ color: rgb(71, 71, 255); }
.is-active::before{ border: 4px solid grey; animation: pulse 2s infinite;}
.is-complete{ color: green; }
.is-complete::before{ color: white; background: green; border: 4px solid transparent; }
.is-complete::after{ background: rgb(89, 117, 209); animation: nextStep 1s; animation-fill-mode: forwards; }
@keyframes pulse{ 0% { box-shadow: 0 0 0 0 rgba(33,131,211,0.4);} 70% { box-shadow: 0 0 0 1rem rgba(33,131,211,0);} 100% { box-shadow: 0 0 0 0 rgba(33, 131, 211, 0);} }
@keyframes nextStep{ 0% { width: 0%; } 100% { width: 100%; } }
</style>
<div id="main">
<div class="progress">
<div class="progress-track"></div>
<div id="step1" class="progress-step is-active">FABRIC INFO</div>
<div id="step2" class="progress-step">ACCESSORY INFO</div>
<div id="step3" class="progress-step">REQUIREMENTS</div>
<div id="step4" class="progress-step">UPLOAD FILES</div>
</div>