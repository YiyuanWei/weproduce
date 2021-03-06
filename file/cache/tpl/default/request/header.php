<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<style>
button{ float: right; position: relative; border-radius: 0.3rem; margin-inline: 0.2rem; padding: 0.3rem 0.5rem; color: white; border: 0.05rem solid lightgray; background-color: rgb(18, 43, 92); }
button:hover{ cursor:pointer; }
input::-webkit-outer-spin-button, input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
input[type=number]{ -moz-appearance: textfield; } 
input{ padding: 0.4rem; }
.step_table{ position: relative; width: max-content;left:50%; transform: translate(-50%);}
.info-table{ position: relative; left: 50%; transform: translate(-50%);font-size:1rem; width: max-content; box-shadow: 0.15rem 0.25rem lightgrey; border:1px solid black; padding: 1rem; }
.info-table select{ padding: 0.4rem; width: 15rem; }
.info-table table{ width: fit-content; }
.info-table table td{ padding-right: 1rem; }
.info-table div{ position: relative;}
.up_file_box { min-width: 15rem; position: relative; max-width: 20rem; }
.up_file_box label{ display: flex; }
.inputfile { display: none; }
.file-box { cursor: pointer; display: inline-block; width: 100%; border: 1px solid; padding: calc(0.25rem + 1px); padding-right: 0px; box-sizing: border-box; height: calc(2rem - 2px); border-radius: .3rem;}
.file-button { cursor: pointer; margin: 0.225rem;  border: 2px solid; top: 0px; right: 0px; border-radius: .3rem; position: absolute; background-color: rgb(18, 43, 92); color: white;}
.up_imgs{ display: block; cursor: pointer; border: 2px dashed grey; border-radius: 2rem; width: 2.5rem; font-size: xx-large; color: black; text-align: center; padding: 2.5rem; background-color: white; margin: 3.6px;}
.up_imgs:hover{ border: 4px solid lightgray; background-color: #113ff412; margin: 1.6px; }
.button_menu{ margin: auto; width: 50%;}
.t_up_imgs{ display: flex; flex-wrap: wrap; width: inherit; max-width: 33rem; }
.t_up_imgs img{ width: 7.5rem; height: 7.5rem; margin:5.6px;}
.t_up_imgs img:hover{ cursor:pointer; border: 1px solid lightgray; width: calc(7.5rem - 2px); height: calc(7.5rem - 2px);}
.progress{ margin-top: 4rem; position: relative; left:50%; transform:translate(-50%); width:80%; display: flex; }
.progress-track{ position: absolute; top: 0.5rem; width: 100%; height: 0.5rem;background-color: lightgrey; z-index: -1; }
.progress-step{ position: relative; width: 100%; font-size: 0.7rem; text-align: center; }
.progress-step::before{ content: "\2713"; display: flex; place-content: center center; margin: 0 auto; margin-bottom: 1rem; width: 1rem; height: 1rem; background: white; border: 0.25rem solid lightgrey; border-radius: 100%; color: white;}
.progress-step::after{content:""; position: absolute; top:.5rem; left: 50%; width: 0%; transition: width 1s ease-in; height: 5px; background: lightgrey; z-index: -1; }
.is-active{ color: rgb(18, 43, 92); }
.is-active::before{ border: 4px solid grey; animation: pulse 2s infinite;}
.is-complete{ color: green; }
.is-complete::before{ color: white; background: green; border: 4px solid transparent; }
.is-complete::after{ background: rgb(89, 117, 209); animation: nextStep 1s; animation-fill-mode: forwards; }
@keyframes pulse{ 0% { box-shadow: 0 0 0 0 rgba(33,131,211,0.4);} 70% { box-shadow: 0 0 0 1rem rgba(33,131,211,0);} 100% { box-shadow: 0 0 0 0 rgba(33, 131, 211, 0);} }
@keyframes nextStep{ 0% { width: 0%; } 100% { width: 100%; } }
#complete_table{ text-align: center; width:max-content; position:relative; left: 50%; transform: translate(-50%);}
#complete_table span{ font-size: 2rem; background-color: green; color: white; border-radius: 50%; display: inline-block; text-align: center; padding: 1rem 1.5rem; }
#complete_table button{ float: none; padding: 0.5rem 1.5rem; }
</style>