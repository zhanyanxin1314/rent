<template> 
    <div class="app">
        <div class="top">
            手机登录注册
        </div>
        <div class="login">
            <form action="">
                <div><input type="text" placeholder="请输入手机号"></div>
                <div><input type="text" placeholder="请输入密码"></div>
                <div class="agreement"><input type="checkbox" checked="true" name="agreement"><span></span>我已同意《好客租房用户服务协议》</div>
                <div><input type="submit" value="登 录" class="sub"></div>
                <div class="prompt"> <a href="#">忘记密码用验证码登录</a></div>
	     </form>
        </div>
        <!-- 页面底部 -->
    </div>
</template> 
 
<style> 
.login-title{ 
  font-family: '黑体 Bold', '黑体'; 
  font-weight: 700; 
  font-style: normal; 
  font-size: 13px; 
  color: #7B7B7B; 
} 
</style> 
<script> 
import Auth from '../services/auth.js' 
 
export default { 
  data () { 
    return { 
        formInline: { 
            user: '', 
            password: '' 
        }, 
        ruleInline: { 
            user: [ 
                { required: true, message: '请填写用户名', trigger: 'blur' } 
            ], 
            password: [ 
                { required: true, message: '请填写密码', trigger: 'blur' } 
            ] 
        } 
    }   
  },  
  methods: { 
    handleSubmit(name) { 
      let obj = { 
        name: this.formInline.user, 
        password: this.formInline.password 
      } 
      if(this.formInline.user.length == 0 || this.formInline.password.length == 0){ 
        this.$Message.error("用户名或密码不能为空") 
        return; 
      } 
      this.$http.post('/auth/index', obj) 
        .then((res) => { 
          console.log(res); 
          if(res.data.success){ 
            Auth.login(res.data.msg); 
            this.$router.push({path:'/'}) 
          }else{ 
            this.$Message.error(res.data.msg); // 登录失败，显示提示语 
          } 
        }, (err) => { 
            this.$Message.error('请求错误！') 
        }) 
    } 
  } 
} 
</script>
