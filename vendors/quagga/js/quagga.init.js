var Quagga = window.Quagga;
var App = {
    _scanner: null,
    init: function() {
        this.attachListeners();
    },
    activateScanner: function(id) {
        var scanner = this.configureScanner('.overlay__content'),
            onDetected = function (result) {
                document.querySelector('#'+id).value = result.codeResult.code;
                stop();
            }.bind(this),
            stop = function() {
                scanner.stop();  // should also clear all event-listeners?
                scanner.removeEventListener('detected', onDetected);
                this.hideOverlay();
                this.attachListeners();
            }.bind(this);

        this.showOverlay(stop);
        scanner.addEventListener('detected', onDetected).start();
    },
    attachListeners: function() {
        var self = this;

        const elements = document.querySelectorAll('.bscan');
        Array.from(elements).forEach((element, index) => {
          var scan_id = element.dataset.scan_id;
          element.addEventListener("click", function onClick(e) {
                e.preventDefault();
                element.removeEventListener("click", onClick);
                self.activateScanner(scan_id);
          });
        });
    },
    showOverlay: function(cancelCb) {
        if (!this._overlay) {
            var content = document.createElement('div'),
                closeButton = document.createElement('div');

            closeButton.appendChild(document.createTextNode('X'));
            content.className = 'overlay__content';
            closeButton.className = 'overlay__close';
            this._overlay = document.createElement('div');
            this._overlay.className = 'overlay';
            this._overlay.appendChild(content);
            content.appendChild(closeButton);
            closeButton.addEventListener('click', function closeClick() {
                closeButton.removeEventListener('click', closeClick);
                cancelCb();
            });
            document.body.appendChild(this._overlay);
        } else {
            var closeButton = document.querySelector('.overlay__close');
            closeButton.addEventListener('click', function closeClick() {
                closeButton.removeEventListener('click', closeClick);
                cancelCb();
            });
        }
        this._overlay.style.display = "block";
    },
    hideOverlay: function() {
        if (this._overlay) {
            this._overlay.style.display = "none";
        }
    },
    configureScanner: function(selector) {
        if (!this._scanner) {
            this._scanner = Quagga
                .decoder({readers: ['ean_reader']})
                .locator({patchSize: 'medium'})
                .fromSource({
                    target: selector,
                    constraints: {
                        width: 280,
                        height: 280,
                        facingMode: "environment"
                    }
                });
        }
        return this._scanner;
    }
};

if (document.querySelector('.bscan') !== null) {
  App.init();
} 