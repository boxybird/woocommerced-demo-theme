document.addEventListener('alpine:init', () => {
  Alpine.magic('listen', () => (listener, callback) => {
    // Listen for fetch requests
    const fetch = window.fetch

    window.fetch = function () {
      const url = arguments[0]

      return fetch.apply(this, arguments).then((response) => {
        url.includes(listener) ? callback() : null
        
        return response
      })
    }

    // Listen for XHR requests
    const send = XMLHttpRequest.prototype.send

    XMLHttpRequest.prototype.send = function () {
      this.addEventListener('load', function () {
        this.responseURL.includes(listener) ? callback() : null
      })

      return send.apply(this, arguments)
    }
  })
})
