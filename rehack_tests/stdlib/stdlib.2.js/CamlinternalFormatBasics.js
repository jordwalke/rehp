(function(joo_global_object)
   {"use strict";
    var runtime=joo_global_object.jsoo_runtime;
    function erase_rel(param)
     {if(typeof param === "number")
       return 0;
      else
       switch(param[0])
        {case 0:var rest=param[1];return [0,erase_rel(rest)];
         case 1:var rest$0=param[1];return [1,erase_rel(rest$0)];
         case 2:var rest$1=param[1];return [2,erase_rel(rest$1)];
         case 3:var rest$2=param[1];return [3,erase_rel(rest$2)];
         case 4:var rest$3=param[1];return [4,erase_rel(rest$3)];
         case 5:var rest$4=param[1];return [5,erase_rel(rest$4)];
         case 6:var rest$5=param[1];return [6,erase_rel(rest$5)];
         case 7:var rest$6=param[1];return [7,erase_rel(rest$6)];
         case 8:
          var rest$7=param[2],ty=param[1];return [8,ty,erase_rel(rest$7)];
         case 9:
          var rest$8=param[3],ty1=param[1];
          return [9,ty1,ty1,erase_rel(rest$8)];
         case 10:var rest$9=param[1];return [10,erase_rel(rest$9)];
         case 11:var rest$10=param[1];return [11,erase_rel(rest$10)];
         case 12:var rest$11=param[1];return [12,erase_rel(rest$11)];
         case 13:var rest$12=param[1];return [13,erase_rel(rest$12)];
         default:var rest$13=param[1];return [14,erase_rel(rest$13)]}}
    function concat_fmtty(fmtty1,fmtty2)
     {if(typeof fmtty1 === "number")
       return fmtty2;
      else
       switch(fmtty1[0])
        {case 0:var rest=fmtty1[1];return [0,concat_fmtty(rest,fmtty2)];
         case 1:var rest$0=fmtty1[1];return [1,concat_fmtty(rest$0,fmtty2)];
         case 2:var rest$1=fmtty1[1];return [2,concat_fmtty(rest$1,fmtty2)];
         case 3:var rest$2=fmtty1[1];return [3,concat_fmtty(rest$2,fmtty2)];
         case 4:var rest$3=fmtty1[1];return [4,concat_fmtty(rest$3,fmtty2)];
         case 5:var rest$4=fmtty1[1];return [5,concat_fmtty(rest$4,fmtty2)];
         case 6:var rest$5=fmtty1[1];return [6,concat_fmtty(rest$5,fmtty2)];
         case 7:var rest$6=fmtty1[1];return [7,concat_fmtty(rest$6,fmtty2)];
         case 8:
          var rest$7=fmtty1[2],ty=fmtty1[1];
          return [8,ty,concat_fmtty(rest$7,fmtty2)];
         case 9:
          var rest$8=fmtty1[3],ty2=fmtty1[2],ty1=fmtty1[1];
          return [9,ty1,ty2,concat_fmtty(rest$8,fmtty2)];
         case 10:var rest$9=fmtty1[1];return [10,concat_fmtty(rest$9,fmtty2)];
         case 11:
          var rest$10=fmtty1[1];return [11,concat_fmtty(rest$10,fmtty2)];
         case 12:
          var rest$11=fmtty1[1];return [12,concat_fmtty(rest$11,fmtty2)];
         case 13:
          var rest$12=fmtty1[1];return [13,concat_fmtty(rest$12,fmtty2)];
         default:
          var rest$13=fmtty1[1];return [14,concat_fmtty(rest$13,fmtty2)]}}
    function concat_fmt(fmt1,fmt2)
     {if(typeof fmt1 === "number")
       return fmt2;
      else
       switch(fmt1[0])
        {case 0:var rest=fmt1[1];return [0,concat_fmt(rest,fmt2)];
         case 1:var rest$0=fmt1[1];return [1,concat_fmt(rest$0,fmt2)];
         case 2:
          var rest$1=fmt1[2],pad=fmt1[1];
          return [2,pad,concat_fmt(rest$1,fmt2)];
         case 3:
          var rest$2=fmt1[2],pad$0=fmt1[1];
          return [3,pad$0,concat_fmt(rest$2,fmt2)];
         case 4:
          var rest$3=fmt1[4],prec=fmt1[3],pad$1=fmt1[2],iconv=fmt1[1];
          return [4,iconv,pad$1,prec,concat_fmt(rest$3,fmt2)];
         case 5:
          var rest$4=fmt1[4],prec$0=fmt1[3],pad$2=fmt1[2],iconv$0=fmt1[1];
          return [5,iconv$0,pad$2,prec$0,concat_fmt(rest$4,fmt2)];
         case 6:
          var rest$5=fmt1[4],prec$1=fmt1[3],pad$3=fmt1[2],iconv$1=fmt1[1];
          return [6,iconv$1,pad$3,prec$1,concat_fmt(rest$5,fmt2)];
         case 7:
          var rest$6=fmt1[4],prec$2=fmt1[3],pad$4=fmt1[2],iconv$2=fmt1[1];
          return [7,iconv$2,pad$4,prec$2,concat_fmt(rest$6,fmt2)];
         case 8:
          var rest$7=fmt1[4],prec$3=fmt1[3],pad$5=fmt1[2],fconv=fmt1[1];
          return [8,fconv,pad$5,prec$3,concat_fmt(rest$7,fmt2)];
         case 9:
          var rest$8=fmt1[2],pad$6=fmt1[1];
          return [9,pad$6,concat_fmt(rest$8,fmt2)];
         case 10:var rest$9=fmt1[1];return [10,concat_fmt(rest$9,fmt2)];
         case 11:
          var rest$10=fmt1[2],str=fmt1[1];
          return [11,str,concat_fmt(rest$10,fmt2)];
         case 12:
          var rest$11=fmt1[2],chr=fmt1[1];
          return [12,chr,concat_fmt(rest$11,fmt2)];
         case 13:
          var rest$12=fmt1[3],fmtty=fmt1[2],pad$7=fmt1[1];
          return [13,pad$7,fmtty,concat_fmt(rest$12,fmt2)];
         case 14:
          var rest$13=fmt1[3],fmtty$0=fmt1[2],pad$8=fmt1[1];
          return [14,pad$8,fmtty$0,concat_fmt(rest$13,fmt2)];
         case 15:var rest$14=fmt1[1];return [15,concat_fmt(rest$14,fmt2)];
         case 16:var rest$15=fmt1[1];return [16,concat_fmt(rest$15,fmt2)];
         case 17:
          var rest$16=fmt1[2],fmting_lit=fmt1[1];
          return [17,fmting_lit,concat_fmt(rest$16,fmt2)];
         case 18:
          var rest$17=fmt1[2],fmting_gen=fmt1[1];
          return [18,fmting_gen,concat_fmt(rest$17,fmt2)];
         case 19:var rest$18=fmt1[1];return [19,concat_fmt(rest$18,fmt2)];
         case 20:
          var rest$19=fmt1[3],char_set=fmt1[2],width_opt=fmt1[1];
          return [20,width_opt,char_set,concat_fmt(rest$19,fmt2)];
         case 21:
          var rest$20=fmt1[2],counter=fmt1[1];
          return [21,counter,concat_fmt(rest$20,fmt2)];
         case 22:var rest$21=fmt1[1];return [22,concat_fmt(rest$21,fmt2)];
         case 23:
          var rest$22=fmt1[2],ign=fmt1[1];
          return [23,ign,concat_fmt(rest$22,fmt2)];
         default:
          var rest$23=fmt1[3],f=fmt1[2],arity=fmt1[1];
          return [24,arity,f,concat_fmt(rest$23,fmt2)]}}
    var CamlinternalFormatBasics=[0,concat_fmtty,erase_rel,concat_fmt];
    runtime.caml_register_global
     (0,CamlinternalFormatBasics,"CamlinternalFormatBasics");
    return}
  (function(){return this}()));
