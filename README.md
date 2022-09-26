php pingurl
```PHP
//http ping 
function postss($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}

while(!postss("http://127.0.0.1:9200/")){
	sleep(2);
}
```




传奇素材

用PHP进行进行批量修改图片素材名字。

达到效果
->0_stand_0 0_stand_1...
->0_run_0 0_run_1...
->0_attack_0 0_attack_1...

```PHP

<?php
$dirs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("C:\\xampp\\htdocs"), RecursiveIteratorIterator::SELF_FIRST);
$regIts = new RegexIterator($dirs, '/^.+\.php$/i');
$count=0;
foreach($regIts as $k=>$p){
	opcache_compile_file($p);
}
echo $count;
?>
```
php安装
./configure --prefix=/root/download/php8 --enable-fpm  --with-curl  --enable-gd --enable-mbstring  --enable-mysqlnd --with-pdo-mysql=mysqlnd


```PHP
$img = imagecreatetruecolor(100, 40);
$black = imagecolorallocate($img, 0x00, 0x00, 0x00);
$green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
$white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
imagefill($img, 0, 0, $white);    //绘制底色为白色
//绘制随机的验证码
$code = '';
$key="QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789";
$code = $key[rand(0, strlen($key)-1)].$key[rand(0, strlen($key)-1)].$key[rand(0, strlen($key)-1)].$key[rand(0, strlen($key)-1)];
imagestring($img, 6, 13, 10, $code, $green);
//加入噪点干扰
for ($i = 0; $i < 50; $i++) {
    imagesetpixel($img, rand(0, 100), rand(0, 100), $black);
    imagesetpixel($img, rand(0, 100), rand(0, 100), $green);
}
//输出验证码
header("content-type: image/png");
imagepng($img);
imagedestroy($img);

php extends study web site
->https://www.php.cn/php-weizijiaocheng-392678.html
->https://segmentfault.com/a/1190000007571341
->https://wiki.php.net/rfc/fast_zpp
->https://github.com/gaohuia/php-src-comment
->https://github.com/pangudashu/php7-internal
->https://qiita.com/d_nishiyama85/items/98f901dcc848a79c81fb
->https://net-newbie.com/phpext/b-gdb.html
->https://yangxikun.com/tags.html#PHP%E6%89%A9%E5%B1%95-ref
->https://net-newbie.com/phpext/7-zval.html#id2
->https://www.kancloud.cn/nickbai/php7/363323
->https://blog.csdn.net/rorntuck7/article/details/86307015
->https://blog.icodef.com/2018/09/25/1508

get all static web page
->https://bazhan.wang/



![(00)-D02-F000](https://user-images.githubusercontent.com/22612129/160961220-4af125ba-6059-4124-a2c4-2d70d0b9e70c.png)

![changed](https://user-images.githubusercontent.com/22612129/161009703-75f97496-e8bc-4141-8cbc-5fa79fb31608.png)

package main

import (
	"fmt"
	"image"
	"image/color"
	"image/draw"
	"image/png"
	_ "image/png"
	"log"
	"os"
	"reflect"
	"time"
)

// import (
// 	"bufio"
// 	"fmt"
// 	"io"
// 	"os"
// 	"strings"
// )

// func main() {
// 	f, err := os.Open("path.txt")
// 	if err != nil {
// 		panic(err)
// 	}
// 	defer f.Close()
// 	rd := bufio.NewReader(f)
// 	for {
// 		line, err := rd.ReadString('\n')

// 		if err != nil || io.EOF == err {
// 			break
// 		}
// 		stra := strings.Split(line, "\\")
// 		strb := strings.Join(stra[2:len(stra)-1], "\\")
// 		err = os.MkdirAll(strb, 0777)
// 		if err != nil {
// 			panic(err)
// 		}
// 		fmt.Println(strb)
// 	}
// }

func microTime() float64 {
	loc, _ := time.LoadLocation("UTC")
	now := time.Now().In(loc)
	micSeconds := float64(now.Nanosecond()) / 1000000000
	return float64(now.Unix()) + micSeconds
}

type Img interface {
	Set(x, y int, c color.Color)
}

func main() {
	f, _ := os.Open("test.png")
	g, _, err := image.Decode(f)
	if err != nil {
		fmt.Println(err)
	}
	fmt.Println(g.At(0, 0).RGBA())
	colorValue := reflect.ValueOf(g.At(0, 0))
	count := colorValue.NumField()
	for i := 0; i < count; i++ {
		f := colorValue.Field(i)
		fmt.Println(f.Uint())
	}
	for x := g.Bounds().Min.X; x < g.Bounds().Dx(); x++ {
		for y := g.Bounds().Min.Y; y < g.Bounds().Dy(); y++ {
			r, gg, a, alpha := g.At(x, y).RGBA()
			if r == 43690 && gg == 43690 && a == 43690 && alpha == 65535 {
				g.(Img).Set(x, y, color.RGBA{0, 0, 0, 1})
			}
		}
	}
	fmt.Println(g.At(0, 0).RGBA())
	colorValue = reflect.ValueOf(g.At(0, 0))
	count = colorValue.NumField()
	for i := 0; i < count; i++ {
		f := colorValue.Field(i)
		fmt.Println(f.Uint())
	}
	img := image.NewRGBA(g.Bounds())
	img.ColorModel().Convert(color.RGBA{})
	draw.Draw(img, g.Bounds(), g, image.Pt(0, 0), draw.Over)
	outFile, err := os.Create("changed.png")

	if err != nil {

		log.Fatal(err)

	}

	defer outFile.Close()

	png.Encode(outFile, img)

}

//golang 打包apk

执行下面的命令  安装ndk 1.9（版本高了低了都不行）
ebitenmobile bind -target android -javapkg golang.diablo2.mobile  -o mobile.aar .\mobile\


国内情况下设置如下代理
$ export GOPROXY=https://goproxy.cn

//防火墙添加端口
firewall-cmd --permanent --zone=public --add-port=8083/tcp
//加载配置
firewall-cmd --reload
//启动防火墙
systemctl start firewalld.service 

golang GMP
https://learnku.com/articles/41728

https://www.deviantart.com/flvck0/art/Barbarian-Diablo-II-Resurrected-898722628

//下面的命令可以不显示console信息框
go build -ldflags "-s -w -H=windowsgui"

boltdb  molebox  setNX antlr




$img = imagecreatetruecolor(100, 40);
$black = imagecolorallocate($img, 0x00, 0x00, 0x00);
$green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
$white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
imagefill($img, 0, 0, $white);    //绘制底色为白色
//绘制随机的验证码
$code = '';
$key="QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789";
$code = $key[rand(0, strlen($key)-1)].$key[rand(0, strlen($key)-1)].$key[rand(0, strlen($key)-1)].$key[rand(0, strlen($key)-1)];
imagestring($img, 6, 13, 10, $code, $green);
//加入噪点干扰
for ($i = 0; $i < 50; $i++) {
    imagesetpixel($img, rand(0, 100), rand(0, 100), $black);
    imagesetpixel($img, rand(0, 100), rand(0, 100), $green);
}
//输出验证码
header("content-type: image/png");
imagepng($img);
imagedestroy($img);

php extends study web site
->https://www.php.cn/php-weizijiaocheng-392678.html
->https://segmentfault.com/a/1190000007571341
->https://wiki.php.net/rfc/fast_zpp
->https://github.com/gaohuia/php-src-comment
->https://github.com/pangudashu/php7-internal
->https://qiita.com/d_nishiyama85/items/98f901dcc848a79c81fb
->https://net-newbie.com/phpext/b-gdb.html
->https://yangxikun.com/tags.html#PHP%E6%89%A9%E5%B1%95-ref
->https://net-newbie.com/phpext/7-zval.html#id2
->https://www.kancloud.cn/nickbai/php7/363323
->https://blog.csdn.net/rorntuck7/article/details/86307015
->https://blog.icodef.com/2018/09/25/1508

get all static web page
->https://bazhan.wang/



![(00)-D02-F000](https://user-images.githubusercontent.com/22612129/160961220-4af125ba-6059-4124-a2c4-2d70d0b9e70c.png)

![changed](https://user-images.githubusercontent.com/22612129/161009703-75f97496-e8bc-4141-8cbc-5fa79fb31608.png)

package main

import (
	"fmt"
	"image"
	"image/color"
	"image/draw"
	"image/png"
	_ "image/png"
	"log"
	"os"
	"reflect"
	"time"
)

// import (
// 	"bufio"
// 	"fmt"
// 	"io"
// 	"os"
// 	"strings"
// )

// func main() {
// 	f, err := os.Open("path.txt")
// 	if err != nil {
// 		panic(err)
// 	}
// 	defer f.Close()
// 	rd := bufio.NewReader(f)
// 	for {
// 		line, err := rd.ReadString('\n')

// 		if err != nil || io.EOF == err {
// 			break
// 		}
// 		stra := strings.Split(line, "\\")
// 		strb := strings.Join(stra[2:len(stra)-1], "\\")
// 		err = os.MkdirAll(strb, 0777)
// 		if err != nil {
// 			panic(err)
// 		}
// 		fmt.Println(strb)
// 	}
// }

func microTime() float64 {
	loc, _ := time.LoadLocation("UTC")
	now := time.Now().In(loc)
	micSeconds := float64(now.Nanosecond()) / 1000000000
	return float64(now.Unix()) + micSeconds
}

type Img interface {
	Set(x, y int, c color.Color)
}

func main() {
	f, _ := os.Open("test.png")
	g, _, err := image.Decode(f)
	if err != nil {
		fmt.Println(err)
	}
	fmt.Println(g.At(0, 0).RGBA())
	colorValue := reflect.ValueOf(g.At(0, 0))
	count := colorValue.NumField()
	for i := 0; i < count; i++ {
		f := colorValue.Field(i)
		fmt.Println(f.Uint())
	}
	for x := g.Bounds().Min.X; x < g.Bounds().Dx(); x++ {
		for y := g.Bounds().Min.Y; y < g.Bounds().Dy(); y++ {
			r, gg, a, alpha := g.At(x, y).RGBA()
			if r == 43690 && gg == 43690 && a == 43690 && alpha == 65535 {
				g.(Img).Set(x, y, color.RGBA{0, 0, 0, 1})
			}
		}
	}
	fmt.Println(g.At(0, 0).RGBA())
	colorValue = reflect.ValueOf(g.At(0, 0))
	count = colorValue.NumField()
	for i := 0; i < count; i++ {
		f := colorValue.Field(i)
		fmt.Println(f.Uint())
	}
	img := image.NewRGBA(g.Bounds())
	img.ColorModel().Convert(color.RGBA{})
	draw.Draw(img, g.Bounds(), g, image.Pt(0, 0), draw.Over)
	outFile, err := os.Create("changed.png")

	if err != nil {

		log.Fatal(err)

	}

	defer outFile.Close()

	png.Encode(outFile, img)

}

//golang 打包apk

执行下面的命令  安装ndk 1.9（版本高了低了都不行）
ebitenmobile bind -target android -javapkg golang.diablo2.mobile  -o mobile.aar .\mobile\


国内情况下设置如下代理
$ export GOPROXY=https://goproxy.cn

//防火墙添加端口
firewall-cmd --permanent --zone=public --add-port=8083/tcp
//加载配置
firewall-cmd --reload
//启动防火墙
systemctl start firewalld.service 

golang GMP
https://learnku.com/articles/41728

https://www.deviantart.com/flvck0/art/Barbarian-Diablo-II-Resurrected-898722628

//下面的命令可以不显示console信息框
go build -ldflags "-s -w -H=windowsgui"
//在Windows平台，强行弹出DOS窗口执行命令行：
cmdLine := pscp -pw pwd local_filename user@host:/home/workspace   
cmd := exec.Command("cmd.exe", "/c", "start " + cmdLine)
err := cmd.Run()
fmt.Printf("%s, error:%v \n", cmdLine, err)
//运行时隐藏cmd窗口
go build -ldflags -H=windowsgui
//Windows平台上，执行系统命令隐藏cmd窗口
cmd := exec.Command("sth")
 if runtime.GOOS == "windows" {
     cmd.SysProcAttr = &syscall.SysProcAttr{HideWindow: true}
 }
 err := cmd.Run()

Goで標準出力をキャプチャする
//https://journal.lampetty.net/entry/capturing-stdout-in-golang

//https://tokoik.github.io/gg/
