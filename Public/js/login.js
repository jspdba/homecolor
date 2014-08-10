/**
 * Created by hadoop on 14-8-9.
 */
var encode_list = [0,2,4,16];

 function encode_safe_pwd(pwd){
    var tmp;
    pwd = decode_sha1_safe_pwd(pwd);
    pwd = pwd.split("");
    var i, c, n,p
    for(i= 0,c=encode_list.length;i<c;i++){
        n = encode_list[i];
        p = pwd[n];
        tmp = parseInt(p,16);
        pwd.splice(n+tmp,0,p);
        pwd.push(p);
        pwd.reverse();
    }
    tmp = 0;
    for(i=0,c=pwd.length;i<c;i++){
        tmp += parseInt(pwd[i],16);
    }
    tmp = ((tmp%2)*2+parseInt(pwd[0],16))%16;
    pwd[0] = tmp.toString(16);
    return pwd.join("");
}


function decode_sha1_safe_pwd(pwd){
    var old = pwd;
    if(pwd.length==48){
        pwd = pwd.split("");
        var i, c, n, p,tmp;
        tmp = 0;
        for(i=0,c=pwd.length;i<c;i++){
            tmp += parseInt(pwd[i],16);
        }
        tmp = (parseInt(pwd[0],16) - (tmp%2)*2);
        if(tmp<0) tmp+=16;
        pwd[0] = tmp.toString(16);

        for(i= encode_list.length-1;i>=0;i--){
            pwd.reverse();
            n = encode_list[i];
            p = pwd[n];
            tmp = parseInt(p,16);
            tmp = pwd.splice(n+tmp,1);
            if(tmp[0]!=pwd.pop()){
                break;
            }
        }
        return pwd.join("");
    }
    return sha1(old);
}