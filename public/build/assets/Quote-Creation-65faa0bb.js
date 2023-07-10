import{d as m,o as i,c as u,a as e,t as d,w as p,e as r,v as a,f as _,F as y,r as x}from"./app-2d9a971f.js";import{_ as b}from"./_plugin-vue_export-helper-c27b6911.js";const f={props:{user:Object,currencies:Array,status:Number},data(){return{quote:{title:"",client_name:"",contact_name:"",contact_email:"",currency:this.currencies[0]||"GBP"}}},methods:{createQuote(){m.Inertia.post("/api/quotes-create",this.quote,{onError:n=>{for(let t in n){let s=$("#"+t);s.addClass("quote-input-error"),s.prop("placeholder",n[t])}},onSuccess:n=>{console.log(n)}})}}},g={class:"flex items-center justify-center min-h-screen bg-gray-100"},h={class:"w-full md:w-1/2 lg:w-1/3 p-6 bg-white shadow-md rounded-xl"},q={class:"text-2xl font-bold mb-4 text-gray-700"},v={class:"mb-4"},w=e("label",{class:"text-gray-600"},"Quote Title",-1),C={class:"mb-4"},Q=e("label",{class:"text-gray-600"},"Client Name",-1),V={class:"mb-4"},U=e("label",{class:"text-gray-600"},"Client Contact Name",-1),B={class:"mb-4"},N=e("label",{class:"text-gray-600"},"Client Contact Email",-1),S={class:"mb-4"},k=e("label",{class:"text-gray-600"},"Quote Currency",-1),E=["value"],F=e("button",{type:"submit",class:"w-full px-3 py-2 mt-4 text-white bg-blue-500 rounded-md hover:bg-blue-600"},"Create Quote",-1);function M(n,t,s,j,l,c){return i(),u("div",g,[e("div",h,[e("h2",q,"Hi "+d(s.user.name),1),e("form",{onSubmit:t[5]||(t[5]=p((...o)=>c.createQuote&&c.createQuote(...o),["prevent"]))},[e("p",null,d(s.status),1),e("div",v,[w,r(e("input",{type:"text",id:"title","onUpdate:modelValue":t[0]||(t[0]=o=>l.quote.title=o),class:"w-full px-3 py-2 mt-1 border rounded-md text-gray-600",placeholder:"Quote title"},null,512),[[a,l.quote.title]])]),e("div",C,[Q,r(e("input",{type:"text",id:"client_name","onUpdate:modelValue":t[1]||(t[1]=o=>l.quote.client_name=o),class:"w-full px-3 py-2 mt-1 border rounded-md text-gray-600",placeholder:"Client name"},null,512),[[a,l.quote.client_name]])]),e("div",V,[U,r(e("input",{type:"text",id:"contact_name","onUpdate:modelValue":t[2]||(t[2]=o=>l.quote.contact_name=o),class:"w-full px-3 py-2 mt-1 border rounded-md text-gray-600",placeholder:"Contact name"},null,512),[[a,l.quote.contact_name]])]),e("div",B,[N,r(e("input",{type:"email",id:"contact_email","onUpdate:modelValue":t[3]||(t[3]=o=>l.quote.contact_email=o),class:"w-full px-3 py-2 mt-1 border rounded-md text-gray-600",placeholder:"Contact email"},null,512),[[a,l.quote.contact_email]])]),e("div",S,[k,r(e("select",{"onUpdate:modelValue":t[4]||(t[4]=o=>l.quote.currency=o),class:"w-full px-3 py-2 mt-1 border rounded-md text-gray-600",required:""},[(i(!0),u(y,null,x(s.currencies,o=>(i(),u("option",{key:o,value:o},d(o),9,E))),128))],512),[[_,l.quote.currency]])]),F],32)])])}const A=b(f,[["render",M]]);export{A as default};
