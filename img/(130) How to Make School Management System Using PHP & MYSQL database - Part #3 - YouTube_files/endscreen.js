(function(g){var window=this;'use strict';var Prb=function(a,b){a.kb("onAutonavCoundownStarted",b)},l6=function(a,b,c){g.bv(a.element,"ytp-suggestion-set",!!b.videoId);
var d=b.playlistId;c=b.gh(c?c:"mqdefault.jpg");var e=null,f=null;b instanceof g.SS&&(b.lengthText?(e=b.lengthText||null,f=b.nw||null):b.lengthSeconds&&(e=g.eH(b.lengthSeconds),f=g.eH(b.lengthSeconds,!0)));var h=!!d;d=h&&"RD"===g.FRa(d).type;var l=b instanceof g.SS?b.isLivePlayback:null,m=b instanceof g.SS?b.isUpcoming:null,n=b.author,p=b.shortViewCount,q=b.publishedTimeText,r=[],t=[];n&&r.push(n);p&&(r.push(p),t.push(p));q&&t.push(q);c={title:b.title,author:n,author_and_views:r.join(" \u2022 "),aria_label:b.ariaLabel||
g.nK("Regarder $TITLE",{TITLE:b.title}),duration:e,timestamp:f,url:b.Tk(),is_live:l,is_upcoming:m,is_list:h,is_mix:d,background:c?"background-image: url("+c+")":"",views_and_publish_time:t.join(" \u2022 "),autoplayAlternativeHeader:b.qs};b instanceof g.RS&&(c.playlist_length=b.playlistLength);a.update(c)},m6=function(a){var b=a.U(),c=b.D;
g.V.call(this,{I:"a",S:"ytp-autonav-suggestion-card",Y:{href:"{{url}}",target:c?b.X:"","aria-label":"{{aria_label}}","data-is-live":"{{is_live}}","data-is-list":"{{is_list}}","data-is-mix":"{{is_mix}}","data-is-upcoming":"{{is_upcoming}}"},V:[{I:"div",La:["ytp-autonav-endscreen-upnext-thumbnail","ytp-autonav-thumbnail-small"],Y:{style:"{{background}}"},V:[{I:"div",Y:{"aria-label":"{{timestamp}}"},La:["ytp-autonav-timestamp"],ya:"{{duration}}"},{I:"div",La:["ytp-autonav-live-stamp"],ya:"En direct"},
{I:"div",La:["ytp-autonav-upcoming-stamp"],ya:"\u00c0 venir"},{I:"div",S:"ytp-autonav-list-overlay",V:[{I:"div",S:"ytp-autonav-mix-text",ya:"Mix"},{I:"div",S:"ytp-autonav-mix-icon"}]}]},{I:"div",La:["ytp-autonav-endscreen-upnext-title","ytp-autonav-title-card"],ya:"{{title}}"},{I:"div",La:["ytp-autonav-endscreen-upnext-author","ytp-autonav-author-card"],ya:"{{author}}"},{I:"div",La:["ytp-autonav-endscreen-upnext-author","ytp-autonav-view-and-date-card"],ya:"{{views_and_publish_time}}"}]});this.J=
a;this.suggestion=null;this.j=c;this.Ta("click",this.onClick);this.Ta("keypress",this.onKeyPress)},n6=function(a,b){b=void 0===b?!1:b;
g.V.call(this,{I:"div",S:"ytp-autonav-endscreen-countdown-overlay"});var c=this;this.N=b;this.G=this.K=void 0;this.C=0;this.container=new g.V({I:"div",S:"ytp-autonav-endscreen-countdown-container"});g.N(this,this.container);this.container.Ja(this.element);b=a.U();var d=b.D;this.J=a;this.suggestion=null;this.onVideoDataChange("newdata",this.J.getVideoData());this.T(a,"videodatachange",this.onVideoDataChange);this.j=new g.V({I:"div",S:"ytp-autonav-endscreen-upnext-container",Y:{"aria-label":"{{aria_label}}",
"data-is-live":"{{is_live}}","data-is-list":"{{is_list}}","data-is-mix":"{{is_mix}}","data-is-upcoming":"{{is_upcoming}}"},V:[{I:"div",S:"ytp-autonav-endscreen-upnext-header"},{I:"div",S:"ytp-autonav-endscreen-upnext-alternative-header",ya:"{{autoplayAlternativeHeader}}"},{I:"a",S:"ytp-autonav-endscreen-link-container",Y:{href:"{{url}}",target:d?b.X:""},V:[{I:"div",S:"ytp-autonav-endscreen-upnext-thumbnail",Y:{style:"{{background}}"},V:[{I:"div",Y:{"aria-label":"{{timestamp}}"},La:["ytp-autonav-timestamp"],
ya:"{{duration}}"},{I:"div",La:["ytp-autonav-live-stamp"],ya:"En direct"},{I:"div",La:["ytp-autonav-upcoming-stamp"],ya:"\u00c0 venir"}]},{I:"div",S:"ytp-autonav-endscreen-video-info",V:[{I:"div",S:"ytp-autonav-endscreen-premium-badge"},{I:"div",S:"ytp-autonav-endscreen-upnext-title",ya:"{{title}}"},{I:"div",S:"ytp-autonav-endscreen-upnext-author",ya:"{{author}}"},{I:"div",S:"ytp-autonav-view-and-date",ya:"{{views_and_publish_time}}"},{I:"div",S:"ytp-autonav-author-and-view",ya:"{{author_and_views}}"}]}]}]});
g.N(this,this.j);this.j.Ja(this.container.element);d||this.T(this.j.Ia("ytp-autonav-endscreen-link-container"),"click",this.ZS);this.J.createClientVe(this.container.element,this,115127);this.J.createClientVe(this.j.Ia("ytp-autonav-endscreen-link-container"),this,115128);this.overlay=new g.V({I:"div",S:"ytp-autonav-overlay"});g.N(this,this.overlay);this.overlay.Ja(this.container.element);this.B=new g.V({I:"div",S:"ytp-autonav-endscreen-button-container"});g.N(this,this.B);this.B.Ja(this.container.element);
this.cancelButton=new g.V({I:"button",La:["ytp-autonav-endscreen-upnext-button","ytp-autonav-endscreen-upnext-cancel-button",b.L("web_modern_buttons")?"ytp-autonav-endscreen-upnext-button-rounded":""],Y:{"aria-label":"Annuler la lecture automatique"},ya:"Annuler"});g.N(this,this.cancelButton);this.cancelButton.Ja(this.B.element);this.cancelButton.Ta("click",this.f2,this);this.J.createClientVe(this.cancelButton.element,this,115129);this.playButton=new g.V({I:"a",La:["ytp-autonav-endscreen-upnext-button",
"ytp-autonav-endscreen-upnext-play-button",b.L("web_modern_buttons")?"ytp-autonav-endscreen-upnext-button-rounded":""],Y:{href:"{{url}}",role:"button","aria-label":"Lire la vid\u00e9o suivante"},ya:"Regarder"});g.N(this,this.playButton);this.playButton.Ja(this.B.element);this.playButton.Ta("click",this.ZS,this);this.J.L("web_player_autonav_next_button_renderer")?(this.J.createServerVe(this.playButton.element,this.playButton,!0),(b=this.J.getVideoData())&&Qrb(this,b)):this.J.createClientVe(this.playButton.element,
this,115130);this.D=new g.Qu(function(){Rrb(c)},500);
g.N(this,this.D);this.YS();this.T(a,"autonavvisibility",this.YS);this.J.L("web_autonav_color_transition")&&(this.T(a,"autonavchange",this.e2),this.T(a,"onAutonavCoundownStarted",this.x9))},o6=function(a){var b=a.J.Bn(!0,a.J.isFullscreen());
g.bv(a.container.element,"ytp-autonav-endscreen-small-mode",a.Hg(b));g.bv(a.container.element,"ytp-autonav-endscreen-is-premium",!!a.suggestion&&!!a.suggestion.HK);g.bv(a.J.getRootNode(),"ytp-autonav-endscreen-cancelled-state",!a.J.zf());g.bv(a.J.getRootNode(),"countdown-running",a.Xk());g.bv(a.container.element,"ytp-player-content",a.J.zf());g.fs(a.overlay.element,{width:b.width+"px"});if(!a.Xk()){a.J.zf()?Srb(a,Math.round(Trb(a)/1E3)):Srb(a);b=!!a.suggestion&&!!a.suggestion.qs;var c=a.J.zf()||!b;
g.bv(a.container.element,"ytp-autonav-endscreen-upnext-alternative-header-only",!c&&b);g.bv(a.container.element,"ytp-autonav-endscreen-upnext-no-alternative-header",c&&!b);g.lG(a.B,a.J.zf());g.bv(a.element,"ytp-enable-w2w-color-transitions",Urb(a))}},Rrb=function(a){var b=Trb(a),c=Math,d=c.min;
var e=a.C?Date.now()-a.C:0;c=d.call(c,e,b);Srb(a,Math.ceil((b-c)/1E3));500>=b-c&&a.Xk()?a.select(!0):a.Xk()&&a.D.start()},Trb=function(a){if(a.J.isFullscreen()){var b;
a=null==(b=a.J.getVideoData())?void 0:b.LB;return-1===a||void 0===a?8E3:a}return 0<=a.J.Ns()?a.J.Ns():g.yJ(a.J.U().experiments,"autoplay_time")||1E4},Qrb=function(a,b){a.J.L("web_player_autonav_next_button_renderer");
b=b.g6;a.K=null==b?void 0:b.navigationEndpoint;b=null==b?void 0:b.trackingParams;a.playButton&&b&&a.J.setTrackingParams(a.playButton.element,b)},Urb=function(a){var b;
return!(null==(b=a.J.getVideoData())||!b.watchToWatchTransitionRenderer)},Srb=function(a,b){b=void 0===b?-1:b;
a=a.j.Ia("ytp-autonav-endscreen-upnext-header");g.uf(a);if(0<=b){b=String(b);var c="Prochaine vid\u00e9o dans $SECONDS".match(RegExp("\\$SECONDS","gi"))[0],d="Prochaine vid\u00e9o dans $SECONDS".indexOf(c);if(0<=d){a.appendChild(g.sf("Prochaine vid\u00e9o dans $SECONDS".slice(0,d)));var e=g.rf("span");g.Wu(e,"ytp-autonav-endscreen-upnext-header-countdown-number");g.zf(e,b);a.appendChild(e);a.appendChild(g.sf("Prochaine vid\u00e9o dans $SECONDS".slice(d+c.length)));return}}g.zf(a,"\u00c0 suivre")},
p6=function(a,b){g.V.call(this,{I:"div",
La:["html5-endscreen","ytp-player-content",b||"base-endscreen"]});this.created=!1;this.player=a},q6=function(a){g.V.call(this,{I:"div",
La:["ytp-upnext","ytp-player-content"],Y:{"aria-label":"{{aria_label}}"},V:[{I:"div",S:"ytp-cued-thumbnail-overlay-image",Y:{style:"{{background}}"}},{I:"span",S:"ytp-upnext-top",V:[{I:"span",S:"ytp-upnext-header",ya:"\u00c0 suivre"},{I:"span",S:"ytp-upnext-title",ya:"{{title}}"},{I:"span",S:"ytp-upnext-author",ya:"{{author}}"}]},{I:"a",S:"ytp-upnext-autoplay-icon",Y:{role:"button",href:"{{url}}","aria-label":"Lire la vid\u00e9o suivante"},V:[{I:"svg",Y:{height:"100%",version:"1.1",viewBox:"0 0 72 72",
width:"100%"},V:[{I:"circle",S:"ytp-svg-autoplay-circle",Y:{cx:"36",cy:"36",fill:"#fff","fill-opacity":"0.3",r:"31.5"}},{I:"circle",S:"ytp-svg-autoplay-ring",Y:{cx:"-36",cy:"36","fill-opacity":"0",r:"33.5",stroke:"#FFFFFF","stroke-dasharray":"211","stroke-dashoffset":"-211","stroke-width":"4",transform:"rotate(-90)"}},{I:"path",S:"ytp-svg-fill",Y:{d:"M 24,48 41,36 24,24 V 48 z M 44,24 v 24 h 4 V 24 h -4 z"}}]}]},{I:"span",S:"ytp-upnext-bottom",V:[{I:"span",S:"ytp-upnext-cancel"},{I:"span",S:"ytp-upnext-paused",
ya:"La lecture automatique est d\u00e9sactiv\u00e9e"}]}]});this.api=a;this.cancelButton=null;this.G=this.Ia("ytp-svg-autoplay-ring");this.C=this.notification=this.j=this.suggestion=null;this.D=new g.Qu(this.gH,5E3,this);this.B=0;var b=this.Ia("ytp-upnext-cancel");this.cancelButton=new g.V({I:"button",La:["ytp-upnext-cancel-button","ytp-button"],Y:{tabindex:"0","aria-label":"Annuler la lecture automatique"},ya:"Annuler"});g.N(this,this.cancelButton);this.cancelButton.Ta("click",this.j2,this);this.cancelButton.Ja(b);
this.cancelButton&&this.api.createClientVe(this.cancelButton.element,this,115129);g.N(this,this.D);this.api.createClientVe(this.element,this,18788);b=this.Ia("ytp-upnext-autoplay-icon");this.T(b,"click",this.l2);this.api.createClientVe(b,this,115130);this.aT();this.T(a,"autonavvisibility",this.aT);this.T(a,"mdxnowautoplaying",this.i$);this.T(a,"mdxautoplaycanceled",this.j$);g.bv(this.element,"ytp-upnext-mobile",this.api.U().B)},Vrb=function(a,b){if(b)return b;
if(a.api.isFullscreen()){var c;a=null==(c=a.api.getVideoData())?void 0:c.LB;return-1===a||void 0===a?8E3:a}return 0<=a.api.Ns()?a.api.Ns():g.yJ(a.api.U().experiments,"autoplay_time")||1E4},Wrb=function(a,b){b=Vrb(a,b);
var c=Math,d=c.min;var e=(0,g.CD)()-a.B;c=d.call(c,e,b);b=0===b?1:Math.min(c/b,1);a.G.setAttribute("stroke-dashoffset",""+-211*(b+1));1<=b&&a.Xk()&&3!==a.api.getPresentingPlayerType()?a.select(!0):a.Xk()&&a.j.start()},r6=function(a){p6.call(this,a,"autonav-endscreen");
this.overlay=this.videoData=null;this.table=new g.V({I:"div",S:"ytp-suggestion-panel",V:[{I:"div",La:["ytp-autonav-endscreen-upnext-header","ytp-autonav-endscreen-more-videos"],ya:"Plus de vid\u00e9os"}]});this.N=new g.V({I:"div",S:"ytp-suggestions-container"});this.videos=[];this.C=null;this.G=this.K=!1;this.B=new n6(this.player);g.N(this,this.B);this.B.Ja(this.element);a.getVideoData().Wf?this.j=this.B:(this.j=new q6(a),g.zU(this.player,this.j.element,4),g.N(this,this.j));this.overlay=new g.V({I:"div",
S:"ytp-autonav-overlay-cancelled-state"});g.N(this,this.overlay);this.overlay.Ja(this.element);this.D=new g.UK(this);g.N(this,this.D);g.N(this,this.table);this.table.Ja(this.element);this.table.show();g.N(this,this.N);this.N.Ja(this.table.element);this.hide()},s6=function(a){var b=a.zf();
b!==a.G&&(a.G=b,a.player.oa("autonavvisibility"),a.G?(a.B!==a.j&&a.B.hide(),a.table.hide()):(a.B!==a.j&&a.B.show(),a.table.show()))},t6=function(a,b){g.V.call(this,{I:"button",
La:["ytp-watch-on-youtube-button","ytp-button"],ya:"{{content}}"});this.J=a;this.buttonType=this.buttonType=b;this.F_();2===this.buttonType&&g.Yu(this.element,"ytp-continue-watching-button");this.Ta("click",this.onClick);this.Ta("videodatachange",this.F_);g.lG(this,!0)},u6=function(a,b){p6.call(this,a,"embeds-lite-endscreen");
this.J=a;this.Ye=b;this.J.createClientVe(this.element,this,156943);this.watchButton=new t6(a,2);g.N(this,this.watchButton);this.watchButton.Ja(this.element);this.hide()},Xrb=function(a){p6.call(this,a,"subscribecard-endscreen");
this.j=new g.V({I:"div",S:"ytp-subscribe-card",V:[{I:"img",S:"ytp-author-image",Y:{src:"{{profilePicture}}"}},{I:"div",S:"ytp-subscribe-card-right",V:[{I:"div",S:"ytp-author-name",ya:"{{author}}"},{I:"div",S:"html5-subscribe-button-container"}]}]});g.N(this,this.j);this.j.Ja(this.element);var b=a.getVideoData();this.subscribeButton=new g.vW("S'abonner",null,"Se d\u00e9sabonner",null,!0,!1,b.Hl,b.subscribed,"trailer-endscreen",null,a,!1);g.N(this,this.subscribeButton);this.subscribeButton.Ja(this.j.Ia("html5-subscribe-button-container"));
this.T(a,"videodatachange",this.Sa);this.Sa();this.hide()},v6=function(a){var b=a.U(),c=g.SK||g.dS?{style:"will-change: opacity"}:void 0,d=b.D,e=["ytp-videowall-still"];
b.B&&e.push("ytp-videowall-show-text");g.V.call(this,{I:"a",La:e,Y:{href:"{{url}}",target:d?b.X:"","aria-label":"{{aria_label}}","data-is-live":"{{is_live}}","data-is-list":"{{is_list}}","data-is-mix":"{{is_mix}}"},V:[{I:"div",S:"ytp-videowall-still-image",Y:{style:"{{background}}"}},{I:"span",S:"ytp-videowall-still-info",Y:{"aria-hidden":"true"},V:[{I:"span",S:"ytp-videowall-still-info-bg",V:[{I:"span",S:"ytp-videowall-still-info-content",Y:c,V:[{I:"span",S:"ytp-videowall-still-info-title",ya:"{{title}}"},
{I:"span",S:"ytp-videowall-still-info-author",ya:"{{author_and_views}}"},{I:"span",S:"ytp-videowall-still-info-live",ya:"En direct"},{I:"span",S:"ytp-videowall-still-info-duration",ya:"{{duration}}"}]}]}]},{I:"span",La:["ytp-videowall-still-listlabel-regular","ytp-videowall-still-listlabel"],Y:{"aria-hidden":"true"},V:[{I:"span",S:"ytp-videowall-still-listlabel-icon"},"Playlist",{I:"span",S:"ytp-videowall-still-listlabel-length",V:[" (",{I:"span",ya:"{{playlist_length}}"},")"]}]},{I:"span",La:["ytp-videowall-still-listlabel-mix",
"ytp-videowall-still-listlabel"],Y:{"aria-hidden":"true"},V:[{I:"span",S:"ytp-videowall-still-listlabel-mix-icon"},"Mix",{I:"span",S:"ytp-videowall-still-listlabel-length",ya:" (50+)"}]}]});this.suggestion=null;this.B=d;this.api=a;this.j=new g.UK(this);g.N(this,this.j);this.Ta("click",this.onClick);this.Ta("keypress",this.onKeyPress);this.j.T(a,"videodatachange",this.onVideoDataChange);a.createServerVe(this.element,this);this.onVideoDataChange()},w6=function(a){p6.call(this,a,"videowall-endscreen");
var b=this;this.J=a;this.C=0;this.stills=[];this.D=this.videoData=null;this.G=this.N=!1;this.X=null;this.B=new g.UK(this);g.N(this,this.B);this.K=new g.Qu(function(){g.Yu(b.element,"ytp-show-tiles")},0);
g.N(this,this.K);var c=new g.V({I:"button",La:["ytp-button","ytp-endscreen-previous"],Y:{"aria-label":"Pr\u00e9c\u00e9dente"},V:[g.rG()]});g.N(this,c);c.Ja(this.element);c.Ta("click",this.q2,this);this.table=new g.iG({I:"div",S:"ytp-endscreen-content"});g.N(this,this.table);this.table.Ja(this.element);c=new g.V({I:"button",La:["ytp-button","ytp-endscreen-next"],Y:{"aria-label":"Suivante"},V:[g.sG()]});g.N(this,c);c.Ja(this.element);c.Ta("click",this.o2,this);a.getVideoData().Wf?this.j=new n6(a,!0):
this.j=new q6(a);g.N(this,this.j);g.zU(this.player,this.j.element,4);a.createClientVe(this.element,this,158789);this.hide()},x6=function(a){return g.AU(a.player)&&a.FC()&&!a.D},y6=function(a){var b=a.zf();
b!==a.N&&(a.N=b,a.player.oa("autonavvisibility"))},z6=function(a){p6.call(this,a,"watch-again-on-youtube-endscreen");
this.watchButton=new t6(a,1);g.N(this,this.watchButton);this.watchButton.Ja(this.element);g.ggb(a)&&(this.j=new g.z2(a),g.N(this,this.j),this.B=new g.V({I:"div",La:["ytp-watch-again-on-youtube-endscreen-more-videos-container"],Y:{tabIndex:"-1"},V:[this.j]}),g.N(this,this.B),this.j.Ja(this.B.element),this.B.Ja(this.element));a.createClientVe(this.element,this,156914);this.hide()},asb=function(a){g.OV.call(this,a);
var b=this;this.endScreen=null;this.B=this.j=this.C=this.D=!1;this.listeners=new g.UK(this);g.N(this,this.listeners);var c=a.U(),d=a.getVideoData();d=d&&0!==d.limitedPlaybackDurationInSeconds;g.CC(g.mS(c))&&d&&!g.wU(a)?(this.B=!0,this.endScreen=new u6(a,g.nU(a))):a.fd()?this.endScreen=new z6(a):Yrb(a)?(this.D=!0,Zrb(this),this.j?this.endScreen=new r6(a):this.endScreen=new w6(a)):c.Rg?this.endScreen=new Xrb(a):this.endScreen=new p6(a);g.N(this,this.endScreen);g.zU(a,this.endScreen.element,4);$rb(this);
this.listeners.T(a,"videodatachange",this.onVideoDataChange,this);this.listeners.T(a,g.hK("endscreen"),function(e){b.onCueRangeEnter(e)});
this.listeners.T(a,g.iK("endscreen"),function(e){b.onCueRangeExit(e)})},Zrb=function(a){var b=a.player.getVideoData();
if(!b||a.j===b.Ll&&a.C===b.Wf)return!1;a.j=b.Ll;a.C=b.Wf;return!0},Yrb=function(a){a=a.U();
return a.Xd&&!a.Rg},$rb=function(a){a.player.Cf("endscreen");
var b=a.player.getVideoData();b=new g.gK(Math.max(1E3*(b.lengthSeconds-10),0),0x8000000000000,{id:"preload",namespace:"endscreen"});var c=new g.gK(0x8000000000000,0x8000000000000,{id:"load",priority:8,namespace:"endscreen"});a.player.xf([b,c])};
g.sU.prototype.Ns=g.ea(16,function(){return this.app.Ns()});
g.c1.prototype.Ns=g.ea(15,function(){return this.getVideoData().KU});
g.oU.prototype.Fr=g.ea(14,function(a){this.Ei().Fr(a)});
g.WW.prototype.Fr=g.ea(13,function(a){this.j!==a&&(this.j=a,this.Sa())});
g.cY.prototype.Fr=g.ea(12,function(a){this.overflowButton&&this.overflowButton.Fr(a)});
g.oU.prototype.Gr=g.ea(11,function(a){this.Ei().Gr(a)});
g.aX.prototype.Gr=g.ea(10,function(a){this.j!==a&&(this.j=a,this.Sa())});
g.cY.prototype.Gr=g.ea(9,function(a){this.shareButton&&this.shareButton.Gr(a)});
g.oU.prototype.kB=g.ea(8,function(a){this.Ei().kB(a)});
g.oW.prototype.kB=g.ea(7,function(a){this.IQ!==a&&(this.IQ=a,this.fq())});
g.oU.prototype.jB=g.ea(6,function(a){this.Ei().jB(a)});
g.cY.prototype.jB=g.ea(5,function(a){this.HQ!==a&&(this.HQ=a,this.eq())});g.w(m6,g.V);m6.prototype.select=function(){this.J.Io(this.suggestion.videoId,this.suggestion.sessionData,this.suggestion.playlistId,void 0,void 0,this.suggestion.ZC||void 0)&&this.J.logClick(this.element)};
m6.prototype.onClick=function(a){g.WU(a,this.J,this.j,this.suggestion.sessionData||void 0)&&this.select()};
m6.prototype.onKeyPress=function(a){switch(a.keyCode){case 13:case 32:a.defaultPrevented||(this.select(),a.preventDefault())}};g.w(n6,g.V);g.k=n6.prototype;g.k.tG=function(a){this.suggestion!==a&&(this.suggestion=a,l6(this.j,a),this.playButton.updateValue("url",this.suggestion.Tk()),o6(this))};
g.k.Xk=function(){return 0<this.C};
g.k.sB=function(){this.Xk()||(this.C=Date.now(),Rrb(this),Prb(this.J,Trb(this)),g.bv(this.J.getRootNode(),"countdown-running",this.Xk()))};
g.k.Rw=function(){this.Yp();Rrb(this);var a=this.j.Ia("ytp-autonav-endscreen-upnext-header");a&&g.zf(a,"\u00c0 suivre")};
g.k.Yp=function(){this.Xk()&&(this.D.stop(),this.C=0)};
g.k.select=function(a){this.J.nextVideo(!1,void 0===a?!1:a);this.Yp()};
g.k.ZS=function(a){g.WU(a,this.J)&&(a.currentTarget===this.playButton.element?this.J.logClick(this.playButton.element):a.currentTarget===this.j.Ia("ytp-autonav-endscreen-link-container")&&(a=this.j.Ia("ytp-autonav-endscreen-link-container"),this.J.logVisibility(a,!0),this.J.logClick(a)),this.J.L("web_player_autonav_next_button_renderer")&&this.K?(this.J.kb("innertubeCommand",this.K),this.Yp()):this.select())};
g.k.f2=function(){this.J.logClick(this.cancelButton.element);g.uU(this.J,!0);this.G&&this.J.kb("innertubeCommand",this.G)};
g.k.onVideoDataChange=function(a,b){this.J.L("web_player_autonav_next_button_renderer")&&Qrb(this,b);var c;this.G=null==(c=b.Y5)?void 0:c.command};
g.k.x9=function(a){if(Urb(this)){var b=this.J.getVideoData().watchToWatchTransitionRenderer,c=null==b?void 0:b.fromColorPaletteDark;b=null==b?void 0:b.toColorPaletteDark;if(c&&b){var d=this.element;d.style.setProperty("--w2w-start-background-color",g.mH(c.surgeColor));d.style.setProperty("--w2w-start-primary-text-color",g.mH(c.primaryTitleColor));d.style.setProperty("--w2w-start-secondary-text-color",g.mH(c.secondaryTitleColor));d.style.setProperty("--w2w-end-background-color",g.mH(b.surgeColor));
d.style.setProperty("--w2w-end-primary-text-color",g.mH(b.primaryTitleColor));d.style.setProperty("--w2w-end-secondary-text-color",g.mH(b.secondaryTitleColor));d.style.setProperty("--w2w-animation-duration",a+"ms")}g.bv(this.element,"ytp-w2w-animate",!0)}};
g.k.e2=function(a){this.J.L("web_autonav_color_transition")&&2!==a&&g.bv(this.element,"ytp-w2w-animate",!1)};
g.k.YS=function(){var a=this.J.zf();this.N&&this.Gb!==a&&g.lG(this,a);o6(this);this.J.logVisibility(this.container.element,a);this.J.logVisibility(this.cancelButton.element,a);this.J.logVisibility(this.j.Ia("ytp-autonav-endscreen-link-container"),a);this.J.logVisibility(this.playButton.element,a)};
g.k.Hg=function(a){return 400>a.width||459>a.height};g.w(p6,g.V);g.k=p6.prototype;g.k.create=function(){this.created=!0};
g.k.destroy=function(){this.created=!1};
g.k.FC=function(){return!1};
g.k.zf=function(){return!1};
g.k.WX=function(){return!1};g.w(q6,g.V);g.k=q6.prototype;g.k.gH=function(){this.notification&&(this.D.stop(),this.Sc(this.C),this.C=null,this.notification.close(),this.notification=null)};
g.k.tG=function(a){this.suggestion=a;l6(this,a,"hqdefault.jpg")};
g.k.aT=function(){g.lG(this,this.api.zf());this.api.logVisibility(this.element,this.api.zf());this.api.logVisibility(this.Ia("ytp-upnext-autoplay-icon"),this.api.zf());this.cancelButton&&this.api.logVisibility(this.cancelButton.element,this.api.zf())};
g.k.r$=function(){window.focus();this.gH()};
g.k.sB=function(a){var b=this;this.Xk()||(g.LE("a11y-announce","\u00c0 suivre "+this.suggestion.title),this.B=(0,g.CD)(),this.j=new g.Qu(function(){Wrb(b,a)},25),Wrb(this,a),Prb(this.api,Vrb(this,a)));
g.$u(this.element,"ytp-upnext-autoplay-paused")};
g.k.hide=function(){g.V.prototype.hide.call(this)};
g.k.Xk=function(){return!!this.j};
g.k.Rw=function(){this.Yp();this.B=(0,g.CD)();Wrb(this);g.Yu(this.element,"ytp-upnext-autoplay-paused")};
g.k.Yp=function(){this.Xk()&&(this.j.dispose(),this.j=null)};
g.k.select=function(a){a=void 0===a?!1:a;if(this.api.U().L("autonav_notifications")&&a&&window.Notification&&"function"===typeof document.hasFocus){var b=Notification.permission;"default"===b?Notification.requestPermission():"granted"!==b||document.hasFocus()||(this.gH(),this.notification=new Notification("\u00c0 suivre",{body:this.suggestion.title,icon:this.suggestion.gh()}),this.C=this.T(this.notification,"click",this.r$),this.D.start())}this.Yp();this.api.nextVideo(!1,a)};
g.k.l2=function(a){!g.yf(this.cancelButton.element,a.target)&&g.WU(a,this.api)&&(this.api.zf()&&this.api.logClick(this.Ia("ytp-upnext-autoplay-icon")),this.select())};
g.k.j2=function(){this.api.zf()&&this.cancelButton&&this.api.logClick(this.cancelButton.element);g.uU(this.api,!0)};
g.k.i$=function(a){this.api.getPresentingPlayerType();this.show();this.sB(a)};
g.k.j$=function(){this.api.getPresentingPlayerType();this.Yp();this.hide()};
g.k.xa=function(){this.Yp();this.gH();g.V.prototype.xa.call(this)};g.w(r6,p6);g.k=r6.prototype;g.k.create=function(){p6.prototype.create.call(this);this.D.T(this.player,"appresize",this.TB);this.D.T(this.player,"onVideoAreaChange",this.TB);this.D.T(this.player,"videodatachange",this.onVideoDataChange);this.D.T(this.player,"autonavchange",this.bT);this.D.T(this.player,"onAutonavCancelled",this.m2);this.onVideoDataChange()};
g.k.show=function(){p6.prototype.show.call(this);(this.K||this.C&&this.C!==this.videoData.clientPlaybackNonce)&&g.uU(this.player,!1);g.AU(this.player)&&this.FC()&&!this.C?(s6(this),2===this.videoData.autonavState?3===this.player.getVisibilityState()?this.j.select(!0):this.j.sB():3===this.videoData.autonavState&&this.j.Rw()):(g.uU(this.player,!0),s6(this));this.TB()};
g.k.hide=function(){p6.prototype.hide.call(this);this.j.Rw();s6(this)};
g.k.TB=function(){var a=this.player.Bn(!0,this.player.isFullscreen());s6(this);o6(this.B);g.bv(this.element,"ytp-autonav-cancelled-small-mode",this.Hg(a));g.bv(this.element,"ytp-autonav-cancelled-tiny-mode",this.JI(a));g.bv(this.element,"ytp-autonav-cancelled-mini-mode",400>=a.width||360>=a.height);this.overlay&&g.fs(this.overlay.element,{width:a.width+"px"});if(!this.G)for(a=0;a<this.videos.length;a++)g.bv(this.videos[a].element,"ytp-suggestion-card-with-margin",1===a%2)};
g.k.onVideoDataChange=function(){var a=this.player.getVideoData();if(this.videoData!==a&&a){this.videoData=a;if((a=this.videoData.suggestions)&&a.length||this.player.L("web_player_autonav_empty_suggestions_fix")){var b=g.sT(this.videoData);b&&(this.j.tG(b),this.j!==this.B&&this.B.tG(b))}if(a&&a.length)for(b=0;b<bsb.length;++b){var c=bsb[b];if(a&&a[c]){this.videos[b]=new m6(this.player);var d=this.videos[b];c=a[c];d.suggestion!==c&&(d.suggestion=c,l6(d,c));g.N(this,this.videos[b]);this.videos[b].Ja(this.N.element)}}this.TB()}};
g.k.bT=function(a){1===a?(this.K=!1,this.C=this.videoData.clientPlaybackNonce,this.j.Yp(),this.Gb&&this.TB()):(this.K=!0,this.zf()&&(2===a?this.j.sB():3===a&&this.j.Rw()))};
g.k.m2=function(a){a?this.bT(1):(this.C=null,this.K=!1)};
g.k.FC=function(){return 1!==this.videoData.autonavState};
g.k.Hg=function(a){return(910>a.width||459>a.height)&&!this.JI(a)&&!(400>=a.width||360>=a.height)};
g.k.JI=function(a){return 800>a.width&&!(400>=a.width||360>=a.height)};
g.k.zf=function(){return this.Gb&&g.AU(this.player)&&this.FC()&&!this.C};
var bsb=[1,3,2,4];g.w(t6,g.V);g.k=t6.prototype;g.k.F_=function(){switch(this.buttonType){case 1:var a="Regarder \u00e0 nouveau sur YouTube";var b=156915;break;case 2:a="Continuer \u00e0 regarder sur YouTube";b=156942;break;default:a="Continuer \u00e0 regarder sur YouTube",b=156942}this.update({content:a});this.J.hasVe(this.element)&&this.J.destroyVe(this.element);this.J.createClientVe(this.element,this,b)};
g.k.onClick=function(a){this.J.L("web_player_log_click_before_generating_ve_conversion_params")&&this.J.logClick(this.element);g.XU(this.getVideoUrl(),this.J,a);this.J.L("web_player_log_click_before_generating_ve_conversion_params")||this.J.logClick(this.element)};
g.k.getVideoUrl=function(){var a=!0;switch(this.buttonType){case 1:a=!0;break;case 2:a=!1}a=this.J.getVideoUrl(a,!1,!1,!0);var b=this.J.U();if(g.eS(b)){var c={};g.eS(b)&&g.hU(this.J,"addEmbedsConversionTrackingParams",[c]);a:{switch(this.buttonType){case 2:b="emb_ytp_continue_watching";break a}b="emb_ytp_watch_again"}g.AP(c,b);a=g.Nm(a,c)}return a};
g.k.logVisibility=function(){this.J.logVisibility(this.element,this.Gb&&this.Z)};
g.k.show=function(){g.V.prototype.show.call(this);this.logVisibility()};
g.k.hide=function(){g.V.prototype.hide.call(this);this.logVisibility()};
g.k.Lc=function(a){g.V.prototype.Lc.call(this,a);this.logVisibility()};g.w(u6,p6);u6.prototype.show=function(){3!==this.player.getPlayerState()&&(p6.prototype.show.call(this),this.Ye.jB(!0),this.Ye.Gr(!0),this.J.U().me||this.Ye.Fr(!0),this.J.logVisibility(this.element,!0),this.watchButton.Lc(!0))};
u6.prototype.hide=function(){p6.prototype.hide.call(this);this.Ye.jB(!1);this.Ye.Gr(!1);this.Ye.Fr(!1);this.J.logVisibility(this.element,!1);this.watchButton.Lc(!1)};g.w(Xrb,p6);Xrb.prototype.Sa=function(){var a=this.player.getVideoData();this.j.update({profilePicture:a.profilePicture,author:a.author});this.subscribeButton.channelId=a.Hl;var b=this.subscribeButton;a.subscribed?b.j():b.B()};g.w(v6,g.V);v6.prototype.select=function(){this.api.Io(this.suggestion.videoId,this.suggestion.sessionData,this.suggestion.playlistId,void 0,void 0,this.suggestion.ZC||void 0)&&this.api.logClick(this.element)};
v6.prototype.onClick=function(a){if(g.eS(this.api.U())&&this.api.L("web_player_log_click_before_generating_ve_conversion_params")){this.api.logClick(this.element);var b=this.suggestion.Tk(),c={};g.bUa(this.api,c,"emb_rel_end");b=g.Nm(b,c);g.XU(b,this.api,a)}else g.WU(a,this.api,this.B,this.suggestion.sessionData||void 0)&&this.select()};
v6.prototype.onKeyPress=function(a){switch(a.keyCode){case 13:case 32:a.defaultPrevented||(this.select(),a.preventDefault())}};
v6.prototype.onVideoDataChange=function(){var a=this.api.getVideoData(),b=this.api.U();this.B=a.Nf?!1:b.D};g.w(w6,p6);g.k=w6.prototype;g.k.create=function(){p6.prototype.create.call(this);var a=this.player.getVideoData();a&&(this.videoData=a);this.iq();this.B.T(this.player,"appresize",this.iq);this.B.T(this.player,"onVideoAreaChange",this.iq);this.B.T(this.player,"videodatachange",this.onVideoDataChange);this.B.T(this.player,"autonavchange",this.AL);this.B.T(this.player,"onAutonavCancelled",this.n2);a=this.videoData.autonavState;a!==this.X&&this.AL(a);this.B.T(this.element,"transitionend",this.Jaa)};
g.k.destroy=function(){g.RC(this.B);g.wb(this.stills);this.stills=[];p6.prototype.destroy.call(this);g.$u(this.element,"ytp-show-tiles");this.K.stop();this.X=this.videoData.autonavState};
g.k.FC=function(){return 1!==this.videoData.autonavState};
g.k.show=function(){var a=this.Gb;p6.prototype.show.call(this);g.$u(this.element,"ytp-show-tiles");this.player.U().B?g.Su(this.K):this.K.start();(this.G||this.D&&this.D!==this.videoData.clientPlaybackNonce)&&g.uU(this.player,!1);x6(this)?(y6(this),2===this.videoData.autonavState?3===this.player.getVisibilityState()?this.j.select(!0):this.j.sB():3===this.videoData.autonavState&&this.j.Rw()):(g.uU(this.player,!0),y6(this));a!==this.Gb&&this.player.logVisibility(this.element,!0)};
g.k.hide=function(){var a=this.Gb;p6.prototype.hide.call(this);this.j.Rw();y6(this);a!==this.Gb&&this.player.logVisibility(this.element,!1)};
g.k.Jaa=function(a){a.target===this.element&&this.iq()};
g.k.iq=function(){var a,b,c,d;var e=(null==(a=this.videoData)?0:null==(b=a.suggestions)?0:b.length)?null==(c=this.videoData)?void 0:c.suggestions:[null==(d=this.videoData)?void 0:g.sT(d)];if(e.length){g.Yu(this.element,"ytp-endscreen-paginate");var f=this.J.Bn(!0,this.J.isFullscreen());if(a=g.nU(this.J))a=a.Ah()?48:32,f.width-=2*a;var h=f.width/f.height;d=96/54;b=a=2;var l=Math.max(f.width/96,2),m=Math.max(f.height/54,2);c=e.length;var n=Math.pow(2,2);var p=c*n+(Math.pow(2,2)-n);p+=Math.pow(2,2)-
n;for(p-=n;0<p&&(a<l||b<m);){var q=a/2,r=b/2,t=a<=l-2&&p>=r*n,v=b<=m-2&&p>=q*n;if((q+1)/r*d/h>h/(q/(r+1)*d)&&v)p-=q*n,b+=2;else if(t)p-=r*n,a+=2;else if(v)p-=q*n,b+=2;else break}d=!1;p>=3*n&&6>=c*n-p&&(4<=b||4<=a)&&(d=!0);n=96*a;p=54*b;h=n/p<h?f.height/p:f.width/n;h=Math.min(h,2);n=Math.floor(Math.min(f.width,n*h));p=Math.floor(Math.min(f.height,p*h));f=this.table.element;f.ariaLive="polite";g.ps(f,n,p);g.fs(f,{marginLeft:n/-2+"px",marginTop:p/-2+"px"});this.j.tG(g.sT(this.videoData));this.j instanceof
n6&&o6(this.j);g.bv(this.element,"ytp-endscreen-takeover",x6(this));y6(this);n+=4;p+=4;h=0;f.ariaBusy="true";for(l=0;l<a;l++)for(m=0;m<b;m++)if(q=h,t=0,d&&l>=a-2&&m>=b-2?t=1:0===m%2&&0===l%2&&(2>m&&2>l?0===m&&0===l&&(t=2):t=2),q=g.ve(q+this.C,c),0!==t){r=this.stills[h];r||(r=new v6(this.player),this.stills[h]=r,f.appendChild(r.element));v=Math.floor(p*m/b);var x=Math.floor(n*l/a),B=Math.floor(p*(m+t)/b)-v-4,E=Math.floor(n*(l+t)/a)-x-4;g.ls(r.element,x,v);g.ps(r.element,E,B);g.fs(r.element,"transitionDelay",
(m+l)/20+"s");g.bv(r.element,"ytp-videowall-still-mini",1===t);g.bv(r.element,"ytp-videowall-still-large",2<t);t=Math.max(E,B);g.bv(r.element,"ytp-videowall-still-round-large",256<=t);g.bv(r.element,"ytp-videowall-still-round-medium",96<t&&256>t);g.bv(r.element,"ytp-videowall-still-round-small",96>=t);q=e[q];r.suggestion!==q&&(r.suggestion=q,t=r.api.U(),v=g.Xu(r.element,"ytp-videowall-still-large")?"hqdefault.jpg":"mqdefault.jpg",l6(r,q,v),g.eS(t)&&!r.api.L("web_player_log_click_before_generating_ve_conversion_params")&&
(t=q.Tk(),v={},g.hU(r.api,"addEmbedsConversionTrackingParams",[v]),t=g.Nm(t,g.AP(v,"emb_rel_end")),r.updateValue("url",t)),(q=(q=q.sessionData)&&q.itct)&&r.api.setTrackingParams(r.element,q));h++}f.ariaBusy="false";g.bv(this.element,"ytp-endscreen-paginate",h<c);for(e=this.stills.length-1;e>=h;e--)a=this.stills[e],g.wf(a.element),g.vb(a);this.stills.length=h}};
g.k.onVideoDataChange=function(){var a=this.player.getVideoData();this.videoData!==a&&(this.C=0,this.videoData=a,this.iq())};
g.k.o2=function(){this.C+=this.stills.length;this.iq()};
g.k.q2=function(){this.C-=this.stills.length;this.iq()};
g.k.WX=function(){return this.j.Xk()};
g.k.AL=function(a){1===a?(this.G=!1,this.D=this.videoData.clientPlaybackNonce,this.j.Yp(),this.Gb&&this.iq()):(this.G=!0,this.Gb&&x6(this)&&(2===a?this.j.sB():3===a&&this.j.Rw()))};
g.k.n2=function(a){if(a){for(a=0;a<this.stills.length;a++)this.J.logVisibility(this.stills[a].element,!0);this.AL(1)}else this.D=null,this.G=!1;this.iq()};
g.k.zf=function(){return this.Gb&&x6(this)};g.w(z6,p6);z6.prototype.ND=function(){var a;return null==(a=this.j)?void 0:a.ND()};
z6.prototype.show=function(){if(3!==this.player.getPlayerState()){p6.prototype.show.call(this);var a=this.B;if(a){var b=this.j.ND();g.bv(this.element,"ytp-shorts-branded-ui",b);b?a.show():a.hide()}var c;null==(c=g.nU(this.player))||c.kB(!0);this.player.logVisibility(this.element,!0);this.watchButton.Lc(!0)}};
z6.prototype.hide=function(){p6.prototype.hide.call(this);var a;null==(a=g.nU(this.player))||a.kB(!1);this.player.logVisibility(this.element,!1);this.watchButton.Lc(!1)};g.w(asb,g.OV);g.k=asb.prototype;g.k.du=function(){var a=this.player.getVideoData(),b=a.mutedAutoplay;if((this.player.fd()||this.B)&&!b)return!0;var c;var d=!!((null==a?0:g.sT(a))||(null==a?0:null==(c=a.suggestions)?0:c.length));d=!Yrb(this.player)||d;a=a.qk;c=this.player.mD();return d&&!a&&!c&&!b};
g.k.zf=function(){return this.endScreen.zf()};
g.k.g8=function(){return this.zf()?this.endScreen.WX():!1};
g.k.xa=function(){this.player.Cf("endscreen");g.OV.prototype.xa.call(this)};
g.k.load=function(){var a=this.player.getVideoData();var b=a.transitionEndpointAtEndOfStream;if(b&&b.videoId){var c=this.player.Cb().Me.get("heartbeat"),d=g.sT(a);!d||b.videoId!==d.videoId||a.KS?(this.player.Io(b.videoId,void 0,void 0,!0,!0,b),c&&c.VI("HEARTBEAT_ACTION_TRIGGER_AT_STREAM_END","HEARTBEAT_ACTION_TRANSITION_REASON_HAS_NEW_STREAM_TRANSITION_ENDPOINT"),a=!0):a=!1}else a=!1;a||(g.OV.prototype.load.call(this),this.endScreen.show())};
g.k.unload=function(){g.OV.prototype.unload.call(this);this.endScreen.hide();this.endScreen.destroy()};
g.k.onCueRangeEnter=function(a){this.du()&&(this.endScreen.created||this.endScreen.create(),"load"===a.getId()&&this.load())};
g.k.onCueRangeExit=function(a){"load"===a.getId()&&this.loaded&&this.unload()};
g.k.onVideoDataChange=function(){$rb(this);this.D&&Zrb(this)&&(this.endScreen&&(this.endScreen.hide(),this.endScreen.created&&this.endScreen.destroy(),this.endScreen.dispose()),this.j?this.endScreen=new r6(this.player):this.endScreen=new w6(this.player),g.N(this,this.endScreen),g.zU(this.player,this.endScreen.element,4))};g.NV("endscreen",asb);})(_yt_player);
