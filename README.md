# 年终奖比一比

## 框架 CodeIgniter 

##数据库

application/config/database.php

## 发布页
```
Controller：applicaton/controllers/index.php
View:application/views/index.php
```


### 详情页
```
Controller：applicaton/controllers/index.php
View:application/views/detail.php
```

```
{
	'anymous':false , //是否是直接浏览结果
	'urank_in_all':'80%', // 用户在全国排名 百分比
    'urank_in_company' : '78%',//用户在公司排名 百分比
    'top10_user_in_company': [{},{}],
    'crank_in_all' : '49%', //公司在全国排名 百分比
    'top10_company_in_all' : [{},{}],
    'posts' => $posts,
}
```

