!function () {
    var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent", eventer = window[eventMethod],
        messageEvent = "attachEvent" == eventMethod ? "onmessage" : "message", config = {
            siteUrl: "https://paystack.com/",
            paystackApiUrl: "https://api.paystack.co/",
            newCheckoutUrl: "https://checkout.paystack.com/"
        };

    function Inline(t) {
        this.iframe = null, this.background = null, this.iframeLoaded = !1, this.iframeOpen = !1, this.defaults = t, this.isEmbed = t && null != t.container, this.checkoutLoaded = !1, this.checkoutRemoved = !1, this.loadedButtonCSS = !1, this.setup(), this.listenForEvents(), noBrowserIframeSupport() && (this.fallback = !0)
    }

    Inline.prototype.setTransaction = function (t) {
        this.defaults && this.resetNewCheckout(), this.defaults = t, this.isEmbed = null != t.container, this.isEmbed ? (this.removeNewCheckout(), this.setupEmbed()) : this.updateIframe()
    }, Inline.prototype.setForm = function (t) {
        this.form = t, this.createButton()
    }, Inline.prototype.loadButtonCSS = function () {
        var t = this;
        cssLoad(SITEURL + "/admin-assets/css/button.min.css").done(function () {
            t.loadedButtonCSS = !0
        })
    }, Inline.prototype.createButton = function () {
        var t, e = this;
        e.defaults.customButton ? (t = document.getElementById(e.defaults.customButton)).setAttribute("data-paystack", e.defaults.id) : ((t = document.createElement("button")).innerHTML = "<span class='paystack-top-blue'>Pay Securely with Paystack</span><span class='paystack-body-image'> </span>", t.setAttribute("class", "paystack-trigger-btn"), t.setAttribute("data-paystack", e.defaults.id), sourceScript.parentNode.insertBefore(t, sourceScript.nextSibling)), t.addEventListener("click", function (t) {
            t.preventDefault(), e.openIframe()
        }, !1)
    }, Inline.prototype.setup = function () {
        this.isEmbed ? this.setupEmbed() : this.setupNewPopup(), this.loadedButtonCSS || this.loadButtonCSS()
    }, Inline.prototype.setupEmbed = function () {
        var t = document.getElementById(this.defaults.container);
        t.innerHTML = "", t.removeAttribute("style"), t.className = "paystack-embed-container", t.style.position = "relative", t.style.width = "100%", this.listenForResizeEvent(), this.appendIframe({
            src: this.getOldCheckoutURL(),
            cssText: "background: transparent;\nbackground: rgba(0,0,0,0);\nborder: 0px none transparent;\noverflow-x: hidden;\noverflow-y: hidden;\nmargin: 0;\npadding: 0;\n-webkit-tap-highlight-color: transparent;\n-webkit-touch-callout: none;\nleft: 0;\ntop: 0;\nwidth: 100%;\nheight: 100%;",
            className: "paystack_embed",
            parent: t
        }), this.isSetup = !0, this.openOldCheckout()
    }, Inline.prototype.setupOldPopup = function () {
        var t = 10 * findHighestZIndex("div"), e = "z-index: " + Math.max(t, 999999);
        e += ";\ndisplay: none;\nbackground: transparent;\nbackground: rgba(0,0,0,0.005);\nborder: 0px none transparent;\noverflow-x: hidden;\noverflow-y: hidden;\nvisibility: hidden;\nmargin: 0;\npadding: 0;\n-webkit-tap-highlight-color: transparent;\n-webkit-touch-callout: none; position: fixed;\nleft: 0;\ntop: 0;\nwidth: 100%;\nheight: 100%;", this.appendIframe({
            src: this.getOldCheckoutURL(),
            cssText: e,
            className: "paystack_pop",
            parent: document.body
        }), this.isSetup = !0
    }, Inline.prototype.getTransactionParameters = function () {
        if (!this.defaults) return null;
        this.defaults.metadata.referrer = getHref();
        var t = omitKeys(this.defaults, ["customButton", "onClose", "callback", "tlsFallback"]);
        return t.mode = "popup", t.hasTLSFallback = null !== this.defaults.tlsFallback, t.metadata && "string" != typeof t.metadata && (t.metadata = JSON.stringify(t.metadata)), t.split && "string" != typeof t.split && 0 < Object.keys(t.split).length && (t.split = JSON.stringify(t.split)), void 0 !== t.card && -1 < ["false", !1].indexOf(t.card) && (t.channels = ["bank"], delete t.card), void 0 !== t.bank && -1 < ["false", !1].indexOf(t.bank) && (t.channels = ["card"], delete t.bank), t
    }, Inline.prototype.getOldCheckoutURL = function () {
        var t = config.siteUrl + "assets/payment/production/inline.html", e = this.getTransactionParameters();
        return e && (t = t + "?" + serialize(e)), t
    }, Inline.prototype.appendIframe = function (t) {
        var e = this;
        iframe = document.createElement("iframe"), iframe.setAttribute("frameBorder", "0"), iframe.setAttribute("allowtransparency", "true"), iframe.setAttribute("allowpaymentrequest", "true"), iframe.style.cssText = t.cssText, iframe.id = iframe.name = e.defaults.id, iframe.src = t.src, iframe.className = t.className, t.parent.appendChild(iframe), e.iframe = iframe, iframe.onload = function () {
            e.iframeLoaded = !0
        }
    }, Inline.prototype.updateIframe = function () {
        var t = this.getTransactionParameters(), e = t ? "newTransaction" : "popup";
        this.iframe.contentWindow.postMessage({type: "inline:url", path: e, params: t}, "*")
    }, Inline.prototype.listenForEvents = function () {
        var e = this;
        eventer(messageEvent, function (t) {
            e.isEmbed ? e.handleOldCheckoutEvents(t) : e.checkoutRemoved || e.handleNewCheckoutEvents(t)
        }, !1)
    }, Inline.prototype.handleOldCheckoutEvents = function (t) {
        var e = this, n = t.data || t.message;
        if (n && ("string" == typeof n || n instanceof String)) {
            var r = parseResponse(n, e.defaults), i = r.isThisIframe && "PaystackClose" === r.action,
                a = "close" === r.action;
            if (i || a) {
                var o = r.data;
                e.isEmbed || e.closeOldCheckout(), o ? e.handleSuccess(JSON.parse(o)) : e.defaults.onClose && e.callCloseCallback()
            }
            "PaystackTLSClose" == r.action && (e.defaults.tlsFallback.call(this), e.isEmbed || e.closeOldCheckout())
        }
    }, Inline.prototype.listenForResizeEvent = function () {
        var r = this;
        eventer(messageEvent, function (t) {
            var e = t.data || t.message;
            if (e && ("string" == typeof e || e instanceof String)) {
                var n = parseResponse(e, r.defaults);
                if (!n.isThisIframe || "PaystackResize" != n.action) return;
                document.getElementById(r.defaults.container).style.height = Math.max(Number(n.data), 250) + "px"
            }
        }, !1)
    }, Inline.prototype.openIframe = function () {
        this.openNewCheckout()
    }, Inline.prototype.openOldCheckout = function () {
        var e = this;
        if (!this.iframeOpen) {
            var t = function () {
                var t = document.getElementById(e.defaults.id);
                t.contentWindow.postMessage("PaystackOpen " + e.defaults.id, "*"), e.isEmbed || (t.style.display = "block", t.style.visibility = "visible", document.body.style.overflow = "hidden"), e.iframeOpen = !0
            };
            e.iframeLoaded ? t() : iframe.onload = function () {
                t(), e.iframeLoaded = !0
            }
        }
    }, Inline.prototype.closeOldCheckout = function () {
        if (this.iframeOpen && !this.isEmbed) {
            var t = document.getElementById(this.defaults.id);
            t.style.display = "none", t.style.visibility = "hidden", this.iframeOpen = !1, document.body.style.overflow = ""
        }
    }, Inline.prototype.setupNewPopup = function () {
        var t = document.createElement("iframe");
        t.setAttribute("frameBorder", "0"), t.setAttribute("allowtransparency", "true"), t.id = randomId(), t.name = "paystack-checkout-background-" + t.id, t.style.cssText = "z-index: 999999999999999;background: transparent;background: rgba(0, 0, 0, 0.75);border: 0px none transparent;overflow-x: hidden;overflow-y: hidden;margin: 0;padding: 0;-webkit-tap-highlight-color: transparent;-webkit-touch-callout: none;position: fixed;left: 0;top: 0;width: 100%;height: 100%;transition: opacity 0.3s;-webkit-transition: opacity 0.3s;visibility: hidden;", t.style.display = "none", this.background = t, document.body.appendChild(t);
        var e = this.background.contentWindow.document;
        e.open(), e.write('<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge"> <title>Paystack Checkout Loader</title> <style> .app-loader { margin: 200px 0; text-align: center; color: white; } @keyframes app-loader__spinner { 0% { opacity: 1; } 100% { opacity: 0; } } @-webkit-keyframes app-loader__spinner { 0% { opacity: 1; } 100% { opacity: 0; } } .app-loader__spinner { position: relative; display: inline-block; } .app-loader__spinner div { left: 95px; top: 35px; position: absolute; -webkit-animation: app-loader__spinner linear 1s infinite; animation: app-loader__spinner linear 1s infinite; background: white; width: 10px; height: 30px; border-radius: 40%; -webkit-transform-origin: 5px 65px; transform-origin: 5px 65px; } .app-loader__spinner div:nth-child(1) { -webkit-transform: rotate(0deg); transform: rotate(0deg); -webkit-animation-delay: -0.916666666666667s; animation-delay: -0.916666666666667s; } .app-loader__spinner div:nth-child(2) { -webkit-transform: rotate(30deg); transform: rotate(30deg); -webkit-animation-delay: -0.833333333333333s; animation-delay: -0.833333333333333s; } .app-loader__spinner div:nth-child(3) { -webkit-transform: rotate(60deg); transform: rotate(60deg); -webkit-animation-delay: -0.75s; animation-delay: -0.75s; } .app-loader__spinner div:nth-child(4) { -webkit-transform: rotate(90deg); transform: rotate(90deg); -webkit-animation-delay: -0.666666666666667s; animation-delay: -0.666666666666667s; } .app-loader__spinner div:nth-child(5) { -webkit-transform: rotate(120deg); transform: rotate(120deg); -webkit-animation-delay: -0.583333333333333s; animation-delay: -0.583333333333333s; } .app-loader__spinner div:nth-child(6) { -webkit-transform: rotate(150deg); transform: rotate(150deg); -webkit-animation-delay: -0.5s; animation-delay: -0.5s; } .app-loader__spinner div:nth-child(7) { -webkit-transform: rotate(180deg); transform: rotate(180deg); -webkit-animation-delay: -0.416666666666667s; animation-delay: -0.416666666666667s; } .app-loader__spinner div:nth-child(8) { -webkit-transform: rotate(210deg); transform: rotate(210deg); -webkit-animation-delay: -0.333333333333333s; animation-delay: -0.333333333333333s; } .app-loader__spinner div:nth-child(9) { -webkit-transform: rotate(240deg); transform: rotate(240deg); -webkit-animation-delay: -0.25s; animation-delay: -0.25s; } .app-loader__spinner div:nth-child(10) { -webkit-transform: rotate(270deg); transform: rotate(270deg); -webkit-animation-delay: -0.166666666666667s; animation-delay: -0.166666666666667s; } .app-loader__spinner div:nth-child(11) { -webkit-transform: rotate(300deg); transform: rotate(300deg); -webkit-animation-delay: -0.083333333333333s; animation-delay: -0.083333333333333s; } .app-loader__spinner div:nth-child(12) { -webkit-transform: rotate(330deg); transform: rotate(330deg); -webkit-animation-delay: 0s; animation-delay: 0s; } .app-loader__spinner { width: 40px; height: 40px; -webkit-transform: translate(-20px, -20px) scale(0.2) translate(20px, 20px); transform: translate(-20px, -20px) scale(0.2) translate(20px, 20px); } </style> </head> <body> <div id="app-loader" class="app-loader"> <div id="spinner" class="app-loader__spinner"> <div></div><div></div><div></div><div></div><div></div><div></div><div> </div><div></div><div></div><div></div><div></div><div></div> </div> </div> </body> </html>'), e.close();
        var n = document.createElement("iframe");
        n.setAttribute("frameBorder", "0"), n.setAttribute("allowtransparency", "true"), n.setAttribute("allowpaymentrequest", "true"), n.id = randomId(), n.name = "paystack-checkout-" + n.id, n.style.cssText = "z-index: 999999999999999;background: transparent;border: 0px none transparent;overflow-x: hidden;overflow-y: hidden;margin: 0;padding: 0;-webkit-tap-highlight-color: transparent;-webkit-touch-callout: none;position: fixed;left: 0;top: 0;width: 100%;height: 100%;visibility:hidden;", n.style.display = "none", n.src = config.newCheckoutUrl + "popup", this.iframe = n, document.body.appendChild(n)
    }, Inline.prototype.openNewCheckout = function () {
        !this.iframe || this.isIframeOpen || this.isEmbed || (this.background.style.display = "", this.background.style.visibility = "visible", this.iframe.style.display = "", this.iframe.contentWindow.postMessage("render", "*"), this.isIframeOpen = !0)
    }, Inline.prototype.removeLoader = function () {
        this.iframe.style.visibility = "visible", this.background.contentWindow.document.getElementById("app-loader").style.display = "none"
    }, Inline.prototype.handleNewCheckoutEvents = function (t) {
        if (t.origin + "/" === config.newCheckoutUrl && this.iframe.contentWindow == t.source) {
            var e = t.data || t.message;
            if ("loaded:checkout" === e && (this.checkoutLoaded = !0, this.defaults && this.updateIframe()), "loaded:transaction" === e && this.removeLoader(), "close" === e) {
                if (this.closeNewCheckout(), !this.defaults.onClose) return;
                this.defaults.onClose.call(this)
            }
            try {
                var n = JSON.parse(e);
                n && "success" === n.status && (this.closeNewCheckout(!0), this.handleSuccess(n))
            } catch (t) {
            }
        }
    }, Inline.prototype.closeNewCheckout = function (t) {
        var e = this;
        e.background.style.opacity = 0, e.iframe.style.display = "none", e.iframe.contentWindow.postMessage("close", "*"), e.isIframeOpen = !1, setTimeout(function () {
            e.resetBackgroundAndLoader()
        }, 300)
    }, Inline.prototype.resetNewCheckout = function () {
        this.resetMainIframe(), this.resetBackgroundAndLoader()
    }, Inline.prototype.resetMainIframe = function () {
        this.iframe.style.visibility = "hidden", this.defaults = null, this.updateIframe()
    }, Inline.prototype.resetBackgroundAndLoader = function () {
        this.background.style.display = "none", this.background.style.opacity = 1, this.background.contentWindow.document.getElementById("app-loader").style.display = "block"
    }, Inline.prototype.removeNewCheckout = function () {
        this.iframe.parentElement.removeChild(this.iframe), this.background.parentElement.removeChild(this.background), this.iframe = null, this.background = null, this.checkoutRemoved = !0
    }, Inline.prototype.handleSuccess = function (t) {
        var e;
        if (this.defaults.callback || this.form) return this.form ? ((e = document.createElement("input")).type = "hidden", e.value = t.reference, e.name = "reference", this.form.appendChild(e), (e = document.createElement("input")).type = "hidden", e.value = t.reference, e.name = "paystack-trxref", this.form.appendChild(e), void this.form.submit()) : void (this.defaults.callback && this.defaults.callback.call(this, t))
    }, Inline.prototype.callCloseCallback = function () {
        this.defaults.onClose && this.defaults.onClose.call(this)
    };
    var PaystackPop = {
        isInitialized: !1, initialize: function (t) {
            ca = new Inline(t), this.isInitialized = !0
        }, setup: function (t, e) {
            var n = "paystack" + randomId(), r = {
                id: n,
                key: t.key || "",
                ref: t.ref || "",
                label: t.label || "",
                email: t.email || "",
                amount: t.amount || "",
                currency: t.currency || "NGN",
                container: t.container,
                customButton: t.custom_button || t.customButton || "",
                firstname: t.firstname || "",
                lastname: t.lastname || "",
                phone: t.phone || "",
                remark: t.remark || "",
                payment_page: t.payment_page || t.paymentPage || "",
                payment_request: t.payment_request || t.paymentRequest || "",
                plan: t.plan || "",
                quantity: t.quantity || "",
                coupon: t.coupon || "",
                customer_code: t.customer_code || t.customerCode || "",
                invoice_limit: t.invoice_limit || t.invoiceLimit || "",
                start_date: t.start_date || t.startDate || "",
                interval: t.interval || t.interval || "",
                subaccount: t.subaccount || "",
                split: t.split || {},
                split_code: t.split_code || "",
                transaction_charge: t.transaction_charge || t.transactionCharge || "",
                bearer: t.bearer || "",
                metadata: t.metadata || {},
                onClose: t.on_close || t.onClose || "",
                callback: t.callback || "",
                tlsFallback: t.tlsFallback || "",
                channels: t.channels || "",
                hash: t.hash || "",
                card: t.card || "",
                bank: t.bank || ""
            };
            if (isValid(r)) {
                if (this.isInitialized ? ca.setTransaction(r) : this.initialize(r), !e) return ca;
                checkForParentForm(e), ca.setForm(getParentForm(e)), window[n] = ca
            }
        }
    }, ca;
    window.PaystackPop = PaystackPop, window.onload = function () {
        PaystackPop.isInitialized || PaystackPop.initialize()
    };
    var sourceScript = document.currentScript || (ia = document.getElementsByTagName("script"), ia[ia.length - 1]), ia;

    function parseObject(e) {
        try {
            return JSON.parse(e)
        } catch (t) {
            return e
        }
    }

    function parseFunction(string) {
        try {
            return eval(string)
        } catch (t) {
            return string
        }
    }

    function randomId() {
        for (var t = "", e = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", n = 0; n < 5; n++) t += e.charAt(Math.floor(Math.random() * e.length));
        return t
    }

    function isValid(t) {
        if (validateInputTypes(t), null == t.key) throw new Error("Please provide your public key via the key attribute");
        if (null == t.amount && null == t.plan) throw new Error("Please provide transaction amount via the amount or plan attribute");
        if (null == t.email && null == t.customer_code) throw new Error("Please provide customer email via the email or customerCode attribute");
        if (t.transaction_charge && t.transaction_charge >= t.amount) throw new Error("Transaction charge must be less than the transaction amount");
        if (t.bearer && "account" != t.bearer && "subaccount" != t.bearer) throw new Error("Bearer should be either account or subaccount");
        if (t.channels && !t.channels.length) throw new Error("Channels should be an array of [card, bank] values");
        if (t.customButton && null != t.customButton && null == document.getElementById(t.customButton)) throw new Error("Please ensure a button with id " + t.customButton + " is defined");
        if (t.container && null != t.container && null == document.getElementById(t.container)) throw new Error("Please ensure an element with id " + t.container + " is defined");
        return !0
    }

    function validateInputTypes(t) {
        var n = {
            email: "email",
            amount: "integer",
            transaction_charge: "integer",
            invoice_limit: "integer",
            onClose: "function",
            callback: "function",
            metadata: "object",
            channels: "array"
        };
        for (var e in t) {
            r(e, t[e])
        }

        function r(t, e) {
            if (n[t] && e) switch (n[t]) {
                case"email":
                    isValidEmail(e) || i(t);
                    break;
                case"integer":
                    isNormalInteger(e) || i(t);
                    break;
                case"function":
                    isFunction(e) || i(t);
                    break;
                case"object":
                    isObject(e) || i(t);
                    break;
                case"array":
                    isArray(e) || i(t)
            }
        }

        function i(t) {
            throw new Error("Attribute " + t + " must be a valid " + n[t])
        }
    }

    function checkForParentForm(t) {
        if ("FORM" == t.parentElement.tagName) return !0;
        throw new Error("Please put your Paystack Inline javascript file inside of a form element")
    }

    function getParentForm(t) {
        return form = t.parentElement
    }

    function hasDataAttribute(t) {
        var e = !1, n = t.attributes;
        for (key in n = Array.prototype.slice.call(n)) {
            var r = n[key].nodeName;
            r && -1 < r.indexOf("data") && (e = !0)
        }
        return e
    }

    function noBrowserIframeSupport() {
        var t = "onload" in document.createElement("iframe");
        return t || console.warn("This browser does not support iframes. Please redirect to standard"), !t
    }

    function parseResponse(t, e) {
        var n, r, i, a, o;
        return "string" == typeof t && (n = t.split(" ")[0]), n && (i = (r = t.split(" "))[1], a = r.slice(2).join(" "), o = e.id == i), {
            action: n,
            isThisIframe: o,
            data: a
        }
    }

    function omitKeys(t, e) {
        for (var n = JSON.parse(JSON.stringify(t)), r = 0; r < e.length; r++) delete n[e[r]];
        for (var i in n) n.hasOwnProperty(i) && !n[i] && delete n[i];
        return n
    }

    function serialize(t, e) {
        var n, r = [];
        for (n in t) if (t.hasOwnProperty(n)) {
            var i = e ? e + "[" + n + "]" : n, a = t[n];
            r.push(null !== a && "object" == typeof a ? serialize(a, i) : encodeURIComponent(i) + "=" + encodeURIComponent(a))
        }
        return r.join("&")
    }

    function isObject(t) {
        return t === Object(t) && "[object Array]" !== Object.prototype.toString.call(t)
    }

    function isArray(t) {
        return t.constructor === Array
    }

    function isNormalInteger(t) {
        return parseInt(t) == t && 0 <= t
    }

    function isFunction(t) {
        if (!t) return !1;
        return t && "[object Function]" === {}.toString.call(t)
    }

    function isValidEmail(t) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(t)
    }

    function getHref() {
        var t = window.location.href;
        return t && 500 < t.length && (t = t.split("?")[0]), t
    }

    function findHighestZIndex(t) {
        for (var e = document.getElementsByTagName(t), n = 0, r = 0; r < e.length; r++) {
            var i = document.defaultView.getComputedStyle(e[r], null).getPropertyValue("z-index");
            n < i && "auto" != i && (n = i)
        }
        return parseInt(n)
    }

    function cssLoad(t, e) {
        var n, r, i, a = [], o = [], s = !1, c = !1;

        function d() {
            s = !0;
            for (var t = 0, e = a.length; t < e; t++) a[t]()
        }

        function l() {
            c = !0;
            for (var t = 0, e = o.length; t < e; t++) o[t]()
        }

        this.count = this.count ? ++this.count : 1, this.count, i = t.split("/"), r = "load-css-" + i[i.length - 1], n = {
            done: function (t) {
                return a.push(t), s && t(), n
            }, fail: function (t) {
                return o.push(t), c && t(), n
            }
        };
        var u = document.createElement("link");
        return u.setAttribute("id", r), u.setAttribute("rel", "stylesheet"), u.setAttribute("type", "text/css"), void 0 !== u.addEventListener ? (u.addEventListener("load", d, !1), u.addEventListener("error", l, !1)) : void 0 !== u.attachEvent && u.attachEvent("onload", function () {
            var t, e = document.styleSheets.length;
            try {
                for (; e--;) if ((t = document.styleSheets[e]).id === r) return t.cssText, void d()
            } catch (t) {
            }
            s || l()
        }), document.getElementsByTagName("head")[0].appendChild(u), u.setAttribute("href", t), n
    }

    hasDataAttribute(sourceScript) && PaystackPop.setup({
        key: sourceScript.getAttribute("data-key"),
        ref: sourceScript.getAttribute("data-ref"),
        label: sourceScript.getAttribute("data-label"),
        email: sourceScript.getAttribute("data-email"),
        amount: sourceScript.getAttribute("data-amount"),
        currency: sourceScript.getAttribute("data-currency"),
        container: sourceScript.getAttribute("data-container"),
        customButton: sourceScript.getAttribute("data-custom-button"),
        firstname: sourceScript.getAttribute("data-firstname"),
        lastname: sourceScript.getAttribute("data-lastname"),
        phone: sourceScript.getAttribute("data-phone"),
        remark: sourceScript.getAttribute("data-remark"),
        payment_page: sourceScript.getAttribute("data-payment-page"),
        payment_request: sourceScript.getAttribute("data-payment-request"),
        plan: sourceScript.getAttribute("data-plan"),
        quantity: sourceScript.getAttribute("data-quantity"),
        coupon: sourceScript.getAttribute("data-coupon"),
        customer_code: sourceScript.getAttribute("data-customer-code"),
        invoice_limit: sourceScript.getAttribute("data-invoice-limit"),
        start_date: sourceScript.getAttribute("data-start-date"),
        interval: sourceScript.getAttribute("data-interval"),
        subaccount: sourceScript.getAttribute("data-subaccount"),
        split: parseObject(sourceScript.getAttribute("data-split")),
        split_code: sourceScript.getAttribute("data-split-code"),
        transaction_charge: sourceScript.getAttribute("data-transaction-charge"),
        bearer: sourceScript.getAttribute("data-bearer"),
        metadata: parseObject(sourceScript.getAttribute("data-metadata")),
        onClose: parseFunction(sourceScript.getAttribute("data-on-close")),
        callback: parseFunction(sourceScript.getAttribute("data-callback")),
        tlsFallback: parseFunction(sourceScript.getAttribute("data-tls-callback")),
        channels: sourceScript.getAttribute("data-channels"),
        hash: sourceScript.getAttribute("data-hash"),
        card: sourceScript.getAttribute("data-card"),
        bank: sourceScript.getAttribute("data-bank")
    }, sourceScript)
}(), function (t) {
    "use strict";
    if (!t.fetch) {
        var e = "URLSearchParams" in t, n = "Symbol" in t && "iterator" in Symbol,
            o = "FileReader" in t && "Blob" in t && function () {
                try {
                    return new Blob, !0
                } catch (t) {
                    return !1
                }
            }(), r = "FormData" in t, i = "ArrayBuffer" in t;
        if (i) var a = ["[object Int8Array]", "[object Uint8Array]", "[object Uint8ClampedArray]", "[object Int16Array]", "[object Uint16Array]", "[object Int32Array]", "[object Uint32Array]", "[object Float32Array]", "[object Float64Array]"],
            s = function (t) {
                return t && DataView.prototype.isPrototypeOf(t)
            }, c = ArrayBuffer.isView || function (t) {
                return t && -1 < a.indexOf(Object.prototype.toString.call(t))
            };
        f.prototype.append = function (t, e) {
            t = u(t), e = p(e);
            var n = this.map[t];
            this.map[t] = n ? n + "," + e : e
        }, f.prototype.delete = function (t) {
            delete this.map[u(t)]
        }, f.prototype.get = function (t) {
            return t = u(t), this.has(t) ? this.map[t] : null
        }, f.prototype.has = function (t) {
            return this.map.hasOwnProperty(u(t))
        }, f.prototype.set = function (t, e) {
            this.map[u(t)] = p(e)
        }, f.prototype.forEach = function (t, e) {
            for (var n in this.map) this.map.hasOwnProperty(n) && t.call(e, this.map[n], n, this)
        }, f.prototype.keys = function () {
            var n = [];
            return this.forEach(function (t, e) {
                n.push(e)
            }), h(n)
        }, f.prototype.values = function () {
            var e = [];
            return this.forEach(function (t) {
                e.push(t)
            }), h(e)
        }, f.prototype.entries = function () {
            var n = [];
            return this.forEach(function (t, e) {
                n.push([e, t])
            }), h(n)
        }, n && (f.prototype[Symbol.iterator] = f.prototype.entries);
        var d = ["DELETE", "GET", "HEAD", "OPTIONS", "POST", "PUT"];
        w.prototype.clone = function () {
            return new w(this, {body: this._bodyInit})
        }, g.call(w.prototype), g.call(_.prototype), _.prototype.clone = function () {
            return new _(this._bodyInit, {
                status: this.status,
                statusText: this.statusText,
                headers: new f(this.headers),
                url: this.url
            })
        }, _.error = function () {
            var t = new _(null, {status: 0, statusText: ""});
            return t.type = "error", t
        };
        var l = [301, 302, 303, 307, 308];
        _.redirect = function (t, e) {
            if (-1 === l.indexOf(e)) throw new RangeError("Invalid status code");
            return new _(null, {status: e, headers: {location: t}})
        }, t.Headers = f, t.Request = w, t.Response = _, t.fetch = function (n, i) {
            return new Promise(function (r, t) {
                var e = new w(n, i), a = new XMLHttpRequest;
                a.onload = function () {
                    var t, i, e = {
                        status: a.status,
                        statusText: a.statusText,
                        headers: (t = a.getAllResponseHeaders() || "", i = new f, t.replace(/\r?\n[\t ]+/g, " ").split(/\r?\n/).forEach(function (t) {
                            var e = t.split(":"), n = e.shift().trim();
                            if (n) {
                                var r = e.join(":").trim();
                                i.append(n, r)
                            }
                        }), i)
                    };
                    e.url = "responseURL" in a ? a.responseURL : e.headers.get("X-Request-URL");
                    var n = "response" in a ? a.response : a.responseText;
                    r(new _(n, e))
                }, a.onerror = function () {
                    t(new TypeError("Network request failed"))
                }, a.ontimeout = function () {
                    t(new TypeError("Network request failed"))
                }, a.open(e.method, e.url, !0), "include" === e.credentials ? a.withCredentials = !0 : "omit" === e.credentials && (a.withCredentials = !1), "responseType" in a && o && (a.responseType = "blob"), e.headers.forEach(function (t, e) {
                    a.setRequestHeader(e, t)
                }), a.send(void 0 === e._bodyInit ? null : e._bodyInit)
            })
        }, t.fetch.polyfill = !0
    }

    function u(t) {
        if ("string" != typeof t && (t = String(t)), /[^a-z0-9\-#$%&'*+.\^_`|~]/i.test(t)) throw new TypeError("Invalid character in header field name");
        return t.toLowerCase()
    }

    function p(t) {
        return "string" != typeof t && (t = String(t)), t
    }

    function h(e) {
        var t = {
            next: function () {
                var t = e.shift();
                return {done: void 0 === t, value: t}
            }
        };
        return n && (t[Symbol.iterator] = function () {
            return t
        }), t
    }

    function f(e) {
        this.map = {}, e instanceof f ? e.forEach(function (t, e) {
            this.append(e, t)
        }, this) : Array.isArray(e) ? e.forEach(function (t) {
            this.append(t[0], t[1])
        }, this) : e && Object.getOwnPropertyNames(e).forEach(function (t) {
            this.append(t, e[t])
        }, this)
    }

    function m(t) {
        if (t.bodyUsed) return Promise.reject(new TypeError("Already read"));
        t.bodyUsed = !0
    }

    function y(n) {
        return new Promise(function (t, e) {
            n.onload = function () {
                t(n.result)
            }, n.onerror = function () {
                e(n.error)
            }
        })
    }

    function b(t) {
        var e = new FileReader, n = y(e);
        return e.readAsArrayBuffer(t), n
    }

    function v(t) {
        if (t.slice) return t.slice(0);
        var e = new Uint8Array(t.byteLength);
        return e.set(new Uint8Array(t)), e.buffer
    }

    function g() {
        return this.bodyUsed = !1, this._initBody = function (t) {
            if (this._bodyInit = t) if ("string" == typeof t) this._bodyText = t; else if (o && Blob.prototype.isPrototypeOf(t)) this._bodyBlob = t; else if (r && FormData.prototype.isPrototypeOf(t)) this._bodyFormData = t; else if (e && URLSearchParams.prototype.isPrototypeOf(t)) this._bodyText = t.toString(); else if (i && o && s(t)) this._bodyArrayBuffer = v(t.buffer), this._bodyInit = new Blob([this._bodyArrayBuffer]); else {
                if (!i || !ArrayBuffer.prototype.isPrototypeOf(t) && !c(t)) throw new Error("unsupported BodyInit type");
                this._bodyArrayBuffer = v(t)
            } else this._bodyText = "";
            this.headers.get("content-type") || ("string" == typeof t ? this.headers.set("content-type", "text/plain;charset=UTF-8") : this._bodyBlob && this._bodyBlob.type ? this.headers.set("content-type", this._bodyBlob.type) : e && URLSearchParams.prototype.isPrototypeOf(t) && this.headers.set("content-type", "application/x-www-form-urlencoded;charset=UTF-8"))
        }, o && (this.blob = function () {
            var t = m(this);
            if (t) return t;
            if (this._bodyBlob) return Promise.resolve(this._bodyBlob);
            if (this._bodyArrayBuffer) return Promise.resolve(new Blob([this._bodyArrayBuffer]));
            if (this._bodyFormData) throw new Error("could not read FormData body as blob");
            return Promise.resolve(new Blob([this._bodyText]))
        }, this.arrayBuffer = function () {
            return this._bodyArrayBuffer ? m(this) || Promise.resolve(this._bodyArrayBuffer) : this.blob().then(b)
        }), this.text = function () {
            var t, e, n, r = m(this);
            if (r) return r;
            if (this._bodyBlob) return t = this._bodyBlob, n = y(e = new FileReader), e.readAsText(t), n;
            if (this._bodyArrayBuffer) return Promise.resolve(function (t) {
                for (var e = new Uint8Array(t), n = new Array(e.length), r = 0; r < e.length; r++) n[r] = String.fromCharCode(e[r]);
                return n.join("")
            }(this._bodyArrayBuffer));
            if (this._bodyFormData) throw new Error("could not read FormData body as text");
            return Promise.resolve(this._bodyText)
        }, r && (this.formData = function () {
            return this.text().then(k)
        }), this.json = function () {
            return this.text().then(JSON.parse)
        }, this
    }

    function w(t, e) {
        var n, r, i = (e = e || {}).body;
        if (t instanceof w) {
            if (t.bodyUsed) throw new TypeError("Already read");
            this.url = t.url, this.credentials = t.credentials, e.headers || (this.headers = new f(t.headers)), this.method = t.method, this.mode = t.mode, i || null == t._bodyInit || (i = t._bodyInit, t.bodyUsed = !0)
        } else this.url = String(t);
        if (this.credentials = e.credentials || this.credentials || "omit", !e.headers && this.headers || (this.headers = new f(e.headers)), this.method = (r = (n = e.method || this.method || "GET").toUpperCase(), -1 < d.indexOf(r) ? r : n), this.mode = e.mode || this.mode || null, this.referrer = null, ("GET" === this.method || "HEAD" === this.method) && i) throw new TypeError("Body not allowed for GET or HEAD requests");
        this._initBody(i)
    }

    function k(t) {
        var i = new FormData;
        return t.trim().split("&").forEach(function (t) {
            if (t) {
                var e = t.split("="), n = e.shift().replace(/\+/g, " "), r = e.join("=").replace(/\+/g, " ");
                i.append(decodeURIComponent(n), decodeURIComponent(r))
            }
        }), i
    }

    function _(t, e) {
        e || (e = {}), this.type = "default", this.status = void 0 === e.status ? 200 : e.status, this.ok = 200 <= this.status && this.status < 300, this.statusText = "statusText" in e ? e.statusText : "OK", this.headers = new f(e.headers), this.url = e.url || "", this._initBody(t)
    }
}("undefined" != typeof self ? self : this), function (t, e) {
    "object" == typeof exports && "undefined" != typeof module ? e() : "function" == typeof define && define.amd ? define(e) : e()
}(0, function () {
    "use strict";

    function r() {
    }

    function a(t) {
        if (!(this instanceof a)) throw new TypeError("Promises must be constructed via new");
        if ("function" != typeof t) throw new TypeError("not a function");
        this._state = 0, this._handled = !1, this._value = void 0, this._deferreds = [], d(t, this)
    }

    function i(n, r) {
        for (; 3 === n._state;) n = n._value;
        0 !== n._state ? (n._handled = !0, a._immediateFn(function () {
            var t = 1 === n._state ? r.onFulfilled : r.onRejected;
            if (null !== t) {
                var e;
                try {
                    e = t(n._value)
                } catch (t) {
                    return void s(r.promise, t)
                }
                o(r.promise, e)
            } else (1 === n._state ? o : s)(r.promise, n._value)
        })) : n._deferreds.push(r)
    }

    function o(e, t) {
        try {
            if (t === e) throw new TypeError("A promise cannot be resolved with itself.");
            if (t && ("object" == typeof t || "function" == typeof t)) {
                var n = t.then;
                if (t instanceof a) return e._state = 3, e._value = t, void c(e);
                if ("function" == typeof n) return void d((r = n, i = t, function () {
                    r.apply(i, arguments)
                }), e)
            }
            e._state = 1, e._value = t, c(e)
        } catch (t) {
            s(e, t)
        }
        var r, i
    }

    function s(t, e) {
        t._state = 2, t._value = e, c(t)
    }

    function c(t) {
        2 === t._state && 0 === t._deferreds.length && a._immediateFn(function () {
            t._handled || a._unhandledRejectionFn(t._value)
        });
        for (var e = 0, n = t._deferreds.length; e < n; e++) i(t, t._deferreds[e]);
        t._deferreds = null
    }

    function d(t, e) {
        var n = !1;
        try {
            t(function (t) {
                n || (n = !0, o(e, t))
            }, function (t) {
                n || (n = !0, s(e, t))
            })
        } catch (t) {
            if (n) return;
            n = !0, s(e, t)
        }
    }

    var t = function (e) {
        var n = this.constructor;
        return this.then(function (t) {
            return n.resolve(e()).then(function () {
                return t
            })
        }, function (t) {
            return n.resolve(e()).then(function () {
                return n.reject(t)
            })
        })
    }, e = setTimeout;
    a.prototype.catch = function (t) {
        return this.then(null, t)
    }, a.prototype.then = function (t, e) {
        var n = new this.constructor(r);
        return i(this, new function (t, e, n) {
            this.onFulfilled = "function" == typeof t ? t : null, this.onRejected = "function" == typeof e ? e : null, this.promise = n
        }(t, e, n)), n
    }, a.prototype.finally = t, a.all = function (e) {
        return new a(function (r, i) {
            function a(e, t) {
                try {
                    if (t && ("object" == typeof t || "function" == typeof t)) {
                        var n = t.then;
                        if ("function" == typeof n) return void n.call(t, function (t) {
                            a(e, t)
                        }, i)
                    }
                    o[e] = t, 0 == --s && r(o)
                } catch (t) {
                    i(t)
                }
            }

            if (!e || void 0 === e.length) throw new TypeError("Promise.all accepts an array");
            var o = Array.prototype.slice.call(e);
            if (0 === o.length) return r([]);
            for (var s = o.length, t = 0; o.length > t; t++) a(t, o[t])
        })
    }, a.resolve = function (e) {
        return e && "object" == typeof e && e.constructor === a ? e : new a(function (t) {
            t(e)
        })
    }, a.reject = function (n) {
        return new a(function (t, e) {
            e(n)
        })
    }, a.race = function (i) {
        return new a(function (t, e) {
            for (var n = 0, r = i.length; n < r; n++) i[n].then(t, e)
        })
    }, a._immediateFn = "function" == typeof setImmediate && function (t) {
        setImmediate(t)
    } || function (t) {
        e(t, 0)
    }, a._unhandledRejectionFn = function (t) {
        void 0 !== console && console && console.warn("Possible Unhandled Promise Rejection:", t)
    };
    var n = function () {
        if ("undefined" != typeof self) return self;
        if ("undefined" != typeof window) return window;
        if ("undefined" != typeof global) return global;
        throw Error("unable to locate global object")
    }();
    n.Promise ? n.Promise.prototype.finally || (n.Promise.prototype.finally = t) : n.Promise = a
});
