###innerText
* ��ʾѡ��Ԫ���������
* Ч��ͼ

```
function clickMe(){
    alert(document.getElementById('haha').innerText);
}  
```

###innerHTML
* ��ʾѡ��Ԫ��������ݺ�Ԫ��HTML��ǩ
* Ч��ͼ

```
function clickMe(){
    alert(document.getElementById('haha').innerHTML);
}  
```

###outerHTML
* ��ʾѡ��Ԫ�ر����HTML��ǩ�ͱ�ǩ�ڵ���������
* Ч��ͼ

```
function clickMe(){
    alert(document.getElementById('haha').outerHTML);
}  
```

####HTML����ʾ��
```
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <ul id="haha">
            <li>
                <a onclick="showA(this);">a</a>
            </li>
            <li>
                <a onclick="showA(this);">b</a>
            </li>
            <li>
                <a onclick="showA(this);">c</a>
            </li>
        </ul>
        <button id="clickMe" onclick="clickMe();">����ѽ</button>
    </body>
</html>  
```