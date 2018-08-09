# iots_ahu

# 开启虚拟主机方法
- <prev><code>sudo vim /etc/apache2/httpd.conf</code></prev><br># Include /private/etc/apache2/extra/httpd-vhosts.conf 该行注释去掉
- <prev><code>sudo vim /etc/apache2/extra/httpd-vhosts.conf</code></prev><br>添加虚拟主机配置
- <prev><code>sudo vim /etc/hosts</code></prev><br>增加虚拟主机映射域名

# 配置php.ini和httpd.conf上传问题
- 在httpd.conf中添加如下：<br><prev><code>LimitRequestLine 40940<br>LimitRequestFieldSize 40940</code></prev>