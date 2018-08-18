# iots_ahu

# 开启虚拟主机方法
- <prev><code>sudo vim /etc/apache2/httpd.conf</code></prev><br># Include /private/etc/apache2/extra/httpd-vhosts.conf 该行注释去掉

- <prev><code>sudo vim /etc/apache2/extra/httpd-vhosts.conf</code></prev><br>添加虚拟主机配置

- <prev><code>sudo vim /etc/hosts</code></prev><br>增加虚拟主机映射域名

# 配置php.ini和httpd.conf上传问题
- 在httpd.conf中添加如下：

```
LimitRequestLine 40940
LimitRequestFieldSize 40940
```

# 项目使用说明：
## 前端结构
### 栏目页面：
- 机构简介
- 研究方向
- 联系我们
- 友情链接

### 文章页面：
- 研究成果
- 合作交流
- 新闻资讯

## 后端管理
### 栏目管理
- 栏目内容展示
- 栏目修改
- 栏目新增（栏目页面需要配合前端代码新增）

### 文章管理
- 新闻管理
- 通知管理
- 论文项目管理
- 合作交流管理

### 图片管理
- 图片列表
- 图片上传

## 图片管理方法
- 文章插入页中，需要通过图片上传页上传内容图片，并使用在wangEditor中使用服务器地址进行图片上传，无法直接在富文本编辑器中上传图片