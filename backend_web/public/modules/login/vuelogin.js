const BTN_INISTATE = "Sign in"
const BTN_IN_PROGRESS = "Procesando..."
const formid = "form-login"
const app = new Vue({
    el: `#${formid}`,
    data(){
        return {
            errors: [],
            btnsend: BTN_INISTATE,
            issending: false,
            email: "eaf@ya.com",
            password: "eaf",
        }
    },
    methods:{
        handleSubmit(e){
            e.preventDefault()
            const self = this
            self.issending = true
            self.btnsend = BTN_IN_PROGRESS
            const url = "/check-login"

            const data = new FormData();
            data.append("action","admin-login")
            data.append("username",self.email)
            data.append("password",self.password)
/*
            const data = {
                action: "admin-login",
                username: self.email,
                password: self.password,
            }

            const oheader = new Headers()
            oheader.set("Content-Type","application/json")
            const json = JSON.stringify(data)
            console.log("json to post",json)
            fetch(url, {
                method: 'post',
                headers: oheader,
                body: json,
            })
 */
            let respstatus = ""

            fetch(url, {
                method: 'post',
                body: data
            })
            .then(response => {
                respstatus = response.status
                return response.json()
            })
            .then(response => {
                console.log("reponse",response)
                //alert(JSON.stringify(response))
                self.issending = false
                self.btnsend = BTN_INISTATE
                if(!response.error && respstatus!="401"){
                    if(!response.token_dbsapify) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'No token received',
                        })
                        localStorage.clear();
                    }
                    else{
                        localStorage.setItem("token_dbsapify",response.token_dbsapify)
                        localStorage.setItem("token_upload",response.token_upload)
                        window.location.href = "/admin"
                        //alert("tokens saved")
                    }
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'This action could not be completed',
                        text: response.error || response.message,
                    })
                    localStorage.clear();
                }
            })
            .catch(error => {
                self.issending = false
                self.btnsend = BTN_INISTATE
                console.log("error catched:",error)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops! Some error has occured',
                    text: JSON.stringify(error),
                })
                localStorage.clear();
            })
        }//handleSubmit(e)
    },//methods
    mounted(){
        console.log("login.vue.mounted")
        this.$refs.email.focus();
        localStorage.clear();
    }
})