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
            fetch(url, {
                method: 'post',
                body: data
            })
            .then(response => response.json())
            .then(response => {
                console.log("reponse",response)
                alert(JSON.stringify(response))
                self.issending = false
                self.btnsend = BTN_INISTATE
                if(!response.error) {
                    //tengo que recibir 2 tokens apify y resources
                    //useruid
                    //window.location.href = "/admin"
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Esta acción no se ha podido completar',
                        text: response.error,
                    })
                }
            })
            .catch(error => {
                self.issending = false
                self.btnsend = BTN_INISTATE
                console.log("error catched:",error)
                Swal.fire({
                    icon: 'error',
                    title: 'Vaya! Ha ocurrido un error',
                    text: error.toString(),
                })
            })
        }//handleSubmit(e)
    },//methods
    mounted(){
        alert("aaa")
        console.log("mounted")
        this.$refs.email.focus();
    }
})