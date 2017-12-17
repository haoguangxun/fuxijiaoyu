function openFile(file){
	var img = document.getElementById("user_img");
	var reader = new FileReader();
	reader.onload = function(evt) {
	img.src = evt.target.result;
	}
	reader.readAsDataURL(file.files[0]);
}
    function Q(s){return document.getElementById(s);}
    function checkWord(c,maxstrlen){
        len=maxstrlen;
        var str = c.value;
        myLen=getStrleng(str,maxstrlen);
        if(len==100){
            var wck=Q("wordCheck100");
        }else if(len==200){
            var wck=Q("wordCheck200");
        }else if(len==500){
            var wck=Q("wordCheck500");
        }
        if(myLen>len*2){
            c.value=str.substring(0,i+1);
        }
        else{
            wck.innerHTML = Math.floor((len*2-myLen)/2);
           }
    }
    function getStrleng(str,maxstrlen){
        myLen =0;
        i=0;
        for(;(i<str.length)&&(myLen<=maxstrlen*2);i++){
        if(str.charCodeAt(i)>0&&str.charCodeAt(i)<128)
        myLen++;
        else
        myLen+=2;
    }
    return myLen;
}