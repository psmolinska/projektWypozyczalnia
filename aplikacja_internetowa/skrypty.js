/**Social buttons**/
var googleplus='<script type="text/javascript" src="https://apis.google.com/js/plusone.js"> {lang: \'pl\'}</script><g:plusone size="medium"></g:plusone>';
var twitter='<script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><a href="https://twitter.com/share" class="twitter-share-button" data-lang="pl">Tweetnij</a>';
var facebook='<script type="text/javascript">(function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1";fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script><div class="fb-like" data-send="false" data-layout="button_count" data-show-faces="false" data-action="recommend" data-font="arial"></div>';
function socialButtons(){var inner='';for(var i=0;i<arguments.length;i++){if(arguments[i]=='googleplus'){inner+=googleplus} else if(arguments[i]=='twitter'){inner+=twitter}else if(arguments[i]=='facebook'){inner+=facebook}}document.write(inner)}
/**Ajax**/
function createXmlHttpRequestObject(){var xmlHttp=false;if(window.ActiveXObject){try{xmlHttp=new ActiveXObject('Microsoft.XMLHTTP')}catch(e){try{xmlHttp=new ActiveXObject('MSXML2.XMLHTTP.6.0')}catch(e){}}}else{try{xmlHttp=new XMLHttpRequest()}catch(e){}}if(!xmlHttp){return null}return xmlHttp}
/**Formularz kontaktowy AJAX 1.0**/
var kontaktXmlHttp=createXmlHttpRequestObject();var kontakt_id='';
function kontaktAjaxProcess(){if(kontaktXmlHttp.readyState==4||kontaktXmlHttp.readyState==0){var kontakt_name=encodeURIComponent(document.getElementById(kontakt_id+'_name').value);var kontakt_email=encodeURIComponent(document.getElementById(kontakt_id+'_email').value);var kontakt_temat=encodeURIComponent(document.getElementById(kontakt_id+'_temat').value);var kontakt_tresc=encodeURIComponent(document.getElementById(kontakt_id+'_tresc').value);var params='name='+kontakt_name+'&email='+kontakt_email+'&temat='+kontakt_temat+'&tresc='+kontakt_tresc;kontaktXmlHttp.open('POST','wyslij-wiadomosc.php',true);kontaktXmlHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');kontaktXmlHttp.onreadystatechange=kontaktHandleServerResponse;kontaktXmlHttp.send(params)}else{setTimeout('kontaktAjaxProcess()',50)}}
function kontaktHandleServerResponse(){if(kontaktXmlHttp.readyState==4){if(kontaktXmlHttp.status==200){var xmlResponse=kontaktXmlHttp.responseXML;var xmlDocumentElement=xmlResponse.documentElement;var info=xmlDocumentElement.firstChild.data;info=info.replace(/\[/g,'<');info=info.replace(/\]/g,'>');document.getElementById(kontakt_id+'_info_tresc').innerHTML=info;if(info.indexOf('wysłan')!=-1){resetKontakt(kontakt_id)}else{document.getElementById(kontakt_id+'_info').style.backgroundColor='#a00000'}document.getElementById(kontakt_id+'_info').style.display='block';document.getElementById(kontakt_id+'_wyslij').disabled='';document.getElementById(kontakt_id+'_wyczysc').disabled=''}else{alert('Wystąpił błąd serwera: nie udało się wysłać wiadomości.')}}}
var max_tresc=2000;var kontakt_alert='';var kontakt_alert_dot='\n     '+String.fromCharCode(8226)+'  ';
function validKontaktForm(){kontakt_alert='';if(!(validKontaktName()&validKontaktEmail()&validKontaktTemat()&validKontaktTresc())){zamknijKontakt(kontakt_id);alert('Nie wszystkie pola zostały wypełnione prawidłowo. Popraw proszę pola zaznaczone na czerwono według poniższych wskazówek:'+kontakt_alert);document.getElementById(kontakt_id+'_name').onkeyup=validKontaktName;document.getElementById(kontakt_id+'_email').onkeyup=validKontaktEmail;document.getElementById(kontakt_id+'_temat').onkeyup=validKontaktTemat;document.getElementById(kontakt_id+'_tresc').onkeyup=validKontaktTresc;return false}document.getElementById(kontakt_id+'_name').onkeyup='';document.getElementById(kontakt_id+'_email').onkeyup='';document.getElementById(kontakt_id+'_temat').onkeyup='';document.getElementById(kontakt_id+'_tresc').onkeyup='';document.getElementById(kontakt_id+'_wyslij').disabled='true';document.getElementById(kontakt_id+'_wyczysc').disabled='true';return true}
function validKontaktName(){if(document.getElementById(kontakt_id+'_name').value==''){document.getElementById(kontakt_id+'_name').className='kontakt_invalid';kontakt_alert+=kontakt_alert_dot+'Podaj imię i nazwisko (do 60 znaków).';return false}document.getElementById(kontakt_id+'_name').className='kontakt_pole';return true}
function validKontaktEmail(){if(document.getElementById(kontakt_id+'_email').value==''){document.getElementById(kontakt_id+'_email').className='kontakt_invalid';kontakt_alert+=kontakt_alert_dot+'Podaj adres e-mail (do 60 znaków).';return false}var emailReg=/^[\w-\.]+@([\w-]+\.)+[\w]{2,4}$/;if(document.getElementById(kontakt_id+'_email').value.match(emailReg)==null){document.getElementById(kontakt_id+'_email').className='kontakt_invalid';kontakt_alert+=kontakt_alert_dot+'Podaj adres e-mail w prawidłowym formacie.';return false}document.getElementById(kontakt_id+'_email').className='kontakt_pole';return true}
function validKontaktTemat(){if(document.getElementById(kontakt_id+'_temat').value==''){document.getElementById(kontakt_id+'_temat').className='kontakt_invalid';kontakt_alert+=kontakt_alert_dot+'Podaj temat wiadomości (do 120 znaków).';return false}document.getElementById(kontakt_id+'_temat').className='kontakt_pole';return true}
function validKontaktTresc(){if(document.getElementById(kontakt_id+'_tresc').value==''){document.getElementById(kontakt_id+'_tresc').className='kontakt_invalid';kontakt_alert+=kontakt_alert_dot+'Wpisz treść wiadomości (do 2000 znaków).';return false}var tresc_count=document.getElementById(kontakt_id+'_tresc').value.length;if(tresc_count>max_tresc){document.getElementById(kontakt_id+'_tresc').className='kontakt_invalid';kontakt_alert+=kontakt_alert_dot+'Treść wiadomości nie może przekraczać '+max_tresc+' znaków (w tej chwili jest '+tresc_count+ ' znaków).';return false}document.getElementById(kontakt_id+'_tresc').className='kontakt_pole';return true}
function kontaktSetId(formid){kontakt_id=formid}
function resetKontakt(formid){kontakt_id=formid;document.getElementById(kontakt_id+'_form').reset();var ids=[kontakt_id+'_name',kontakt_id+'_email',kontakt_id+'_temat',kontakt_id+'_tresc'];for(var i=0;i<ids.length;i++){document.getElementById(ids[i]).className='kontakt_pole'}zamknijKontakt(kontakt_id)}
function wyslijKontakt(formid){kontakt_id=formid;if(validKontaktForm()){document.getElementById(kontakt_id+'_info').style.backgroundColor='#008000';document.getElementById(kontakt_id+'_info').style.display='block';document.getElementById(kontakt_id+'_info_tresc').innerHTML='<b>Trwa wysyłanie wiadomości...</b>';kontaktAjaxProcess()}}
function zamknijKontakt(formid){kontakt_id=formid;document.getElementById(kontakt_id+'_info').style.display='none'}