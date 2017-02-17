IP和子网掩码
我们都知道，ＩＰ是由四段数字组成，在此，我们先来了解一下3类常用的ＩＰ
　　A类IP段　 0.0.0.0 到127.255.255.255
　　B类IP段　 128.0.0.0 到191.255.255.255
　　C类IP段　 192.0.0.0 到223.255.255.255

　　ＸＰ默认分配的子网掩码每段只有255或0
　　Ａ类的默认子网掩码　255.0.0.0　　　　　一个子网最多可以容纳1677万多台电脑
　　Ｂ类的默认子网掩码　255.255.0.0　　　　一个子网最多可以容纳6万台电脑
　　Ｃ类的默认子网掩码　255.255.255.0　　　一个子网最多可以容纳254台电脑

　　我以前认为，要想把一些电脑搞在同一网段，只要ＩＰ的前三段一样就可以了，今天，我才知道我错了。如果照我这说的话，一个子网就只能容纳254台电脑？真是有点笑话。我们来说详细看看吧。

　　要想在同一网段，只要网络标识相同就可以了，那要怎么看网络标识呢？首先要做的是把每段的ＩＰ转换为二进制。（有人说，我不会转换耶，没关系，我们用Ｗｉｎｄｏｗｓ自带计算器就行。打开计算器，点查看>科学型，输入十进制的数字，再点一下岸啤闭飧龅パ〉悖涂梢郧谢恢炼屏恕＃?br>
　　把子网掩码切换至二进制，我们会发现，所有的子网掩码是由一串[red]连续[/red]的1和一串[red]连续[/red]的0组成的（一共4段，每段8位，一共32位数）。
　　255.0.0.0　　　11111111.00000000.00000000.00000000
　　255.255.0.0　　11111111.11111111.00000000.00000000
　　255.255.255.0　11111111.11111111.11111111.00000000
　　这是A/B/C三类默认子网掩码的二进制形式，其实，还有好多种子网掩码，只要是一串连续的1和一串连续的0就可以了（每段都是8位）。如11111111.11111111.11111000.00000000，这也是一段合法的子网掩码。子网掩码决定的是一个子网的计算机数目，计算机公式是2的m次方，其中，我们可以把m看到是后面的多少颗0。如255.255.255.0转换成二进制，那就是11111111.11111111.11111111.00000000，后面有8颗0，那m就是8，255.255.255.0这个子网掩码可以容纳2的8次方（台）电脑，也就是256台，但是有两个ＩＰ是不能用的，那就是最后一段不能为0和255，减去这两台，就是254台。我们再来做一个。
　　255.255.248.0这个子网掩码可以最多容纳多少台电脑？
　　计算方法：
　　把将其转换为二进制的四段数字（每段要是8位，如果是0，可以写成8个0，也就是00000000）
　　11111111.1111111.11111000.00000000
　　然后，数数后面有几颗0，一共是有11颗，那就是2的11次方，等于2048，这个子网掩码最多可以容纳2048台电脑。
　　一个子网最多可以容纳多少台电脑你会算了吧，下面我们来个逆向算法的题。
　　一个公司有530台电脑，组成一个对等局域网，子网掩码设多少最合适？
　　首先，无疑，530台电脑用Ｂ类ＩＰ最合适（Ａ类不用说了，太多，Ｃ类又不够，肯定是Ｂ类），但是B类默认的子网掩码是255.255.0.0，可以容纳6万台电脑，显然不太合适，那子网掩码设多少合适呢？我们先来列个公式。
　　2的m次方＝560
　　首先，我们确定2一定是大于8次方的，因为我们知道2的8次方是256，也就是Ｃ类ＩＰ的最大容纳电脑的数目，我们从9次方一个一个试2的9次方是512，不到560，2的10次方是1024，看来2的10次方最合适了。子网掩码一共由32位组成，已确定后面10位是0了，那前面的22位就是1，最合适的子网掩码就是：11111111.11111111.11111100.00000000，转换成10进制，那就是255.255.252.0。

　　分配和计算子网掩码你会了吧，下面，我们来看看ＩＰ地址的网段。
　　相信好多人都和偶一样，认为ＩＰ只要前三段相同，就是在同一网段了，其实，不是这样的，同样，我样把ＩＰ的每一段转换为一个二进制数，这里就拿ＩＰ：192.168.0.1，子网掩码：255.255.255.0做实验吧。
　　192.168.0.1
　　11000000.10101000.00000000.00000001
　　（这里说明一下，和子网掩码一样，每段8位，不足8位的，前面加0补齐。）
　　ＩＰ　　　　11000000.10101000.00000000.00000001
　　子网掩码　　11111111.11111111.11111111.00000000
　　在这里，向大家说一下到底怎么样才算同一网段。
　　要想在同一网段，必需做到网络标识相同，那网络标识怎么算呢？各类ＩＰ的网络标识算法都是不一样的。Ａ类的，只算第一段。Ｂ类，只算第一、二段。Ｃ类，算第一、二、三段。
　　算法只要把ＩＰ和子网掩码的每位数AND就可以了。
　　AND方法：0和1＝0　0和0＝0　1和1＝1
　　如：And　192.168.0.1，255.255.255.0，先转换为二进制，然后AND每一位
　　ＩＰ　　　　　　11000000.10101000.00000000.00000001
　　子网掩码　　　　11111111.11111111.11111111.00000000
　　得出AND结果　 11000000.10101000.00000000.00000000
　　转换为十进制192.168.0.0，这就是网络标识，
　　再将子网掩码反取，也就是00000000.00000000.00000000.11111111，与IP　AND
　　得出结果00000000.00000000.00000000.00000001，转换为10进制，即0.0.0.1，
　　这0.0.0.1就是主机标识。要想在同一网段，必需做到网络标识一样。

　　我们再来看看这个改为默认子网掩码的Ｂ类ＩＰ
　　如ＩＰ：188.188.0.111，188.188.5.222，子网掩码都设为255.255.254.0，在同一网段吗？
　　先将这些转换成二进制
　　188.188.0.111　10111100.10111100.00000000.01101111
　　188.188.5.222　10111100.10111100.00000101.11011010
　　255.255.254.0　11111111.11111111.11111110.00000000
　　分别AND，得
　　10111100.10111100.00000000.00000000
　　10111100.10111100.00000100.00000000
　　网络标识不一样，即不在同一网段。
　　判断是不是在同一网段，你会了吧，下面，我们来点实际的。
　　一个公司有530台电脑，组成一个对等局域网，子网掩码和ＩＰ设多少最合适？
　　子网掩码不说了，前面算出结果来了11111111.11111111.11111100.00000000，也就是255.255.252.0
　　我们现在要确定的是ＩＰ如何分配，首先，选一个Ｂ类ＩＰ段，这里就选188.188.x.x吧
　　这样，ＩＰ的前两段确定的，关键是要确定第三段，只要网络标识相同就可以了。我们先来确定网络号。（我们把子网掩码中的1和IP中的?对就起来，0和*对应起来，如下：）
　　255.255.252.0　11111111.11111111.11111100.00000000
　　188.188.x.x　　10111100.10111100.??????**.********
　　网络标识　　　10111100.10111100.??????00.00000000
　　由此可知，?处随便填（只能用0和1填，不一定全是0和1），我们就用全填0吧，*处随便，这样呢，我们的ＩＰ就是
　　10111100.10111100.000000**.********，一共有530台电脑，ＩＰ的最后一段1～254可以分给254台计算机，530/254＝2.086，采用进1法，得整数3，这样，我们确定了ＩＰ的第三段要分成三个不同的数字，也就是说，把000000**中的**填三次数字，只能填1和0，而且每次的数字都不一样，至于填什么，就随我们便了，如00000001，00000010，00000011，转换成二进制，分别是1，2，3，这样，第三段也确定了，这样，就可以把ＩＰ分成188.188.1.y，188.188.2.y，188.188.3.y，y处随便填，只要在1～254范围之内，并且这530台电脑每台和每台的ＩＰ不一样，就可以了。

　　有人也许会说，既然算法这么麻烦，干脆用Ａ类ＩＰ和Ａ类默认子网掩码得了，偶要告诉你的是，由于Ａ类ＩＰ和Ａ类默认子网掩码的主机数目过大，这样做无疑是大海捞针，如果同时局域网访问量过频繁、过大，会影响效率的，所以，最好设置符合自己的ＩＰ和子网掩码^_^