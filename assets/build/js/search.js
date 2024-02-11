/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/search/index.js":
/*!********************************!*\
  !*** ./src/js/search/index.js ***!
  \********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils */ "./src/js/utils/index.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
function _callSuper(t, o, e) { return o = _getPrototypeOf(o), _possibleConstructorReturn(t, _isNativeReflectConstruct() ? Reflect.construct(o, e || [], _getPrototypeOf(t).constructor) : o.apply(t, e)); }
function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }
function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }
function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }
function _wrapNativeSuper(Class) { var _cache = typeof Map === "function" ? new Map() : undefined; _wrapNativeSuper = function _wrapNativeSuper(Class) { if (Class === null || !_isNativeFunction(Class)) return Class; if (typeof Class !== "function") { throw new TypeError("Super expression must either be null or a function"); } if (typeof _cache !== "undefined") { if (_cache.has(Class)) return _cache.get(Class); _cache.set(Class, Wrapper); } function Wrapper() { return _construct(Class, arguments, _getPrototypeOf(this).constructor); } Wrapper.prototype = Object.create(Class.prototype, { constructor: { value: Wrapper, enumerable: false, writable: true, configurable: true } }); return _setPrototypeOf(Wrapper, Class); }; return _wrapNativeSuper(Class); }
function _construct(t, e, r) { if (_isNativeReflectConstruct()) return Reflect.construct.apply(null, arguments); var o = [null]; o.push.apply(o, e); var p = new (t.bind.apply(t, o))(); return r && _setPrototypeOf(p, r.prototype), p; }
function _isNativeReflectConstruct() { try { var t = !Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); } catch (t) {} return (_isNativeReflectConstruct = function _isNativeReflectConstruct() { return !!t; })(); }
function _isNativeFunction(fn) { try { return Function.toString.call(fn).indexOf("[native code]") !== -1; } catch (e) { return typeof fn === "function"; } }
function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }
function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }


// import {} from './data';
var AquilaCheckboxAccordion = /*#__PURE__*/function (_HTMLElement) {
  _inherits(AquilaCheckboxAccordion, _HTMLElement);
  /**
   * Constructor.
   */
  function AquilaCheckboxAccordion() {
    var _this;
    _classCallCheck(this, AquilaCheckboxAccordion);
    _this = _callSuper(this, AquilaCheckboxAccordion);

    // Elements.
    _this.filterKey = _this.getAttribute("key");
    _this.content = _this.querySelector(".checkbox-accordion__content");
    _this.accordionHandle = _this.querySelector(".checkbox-accordion__handle");
    if (!_this.accordionHandle || !_this.content || !_this.filterKey) {
      return _possibleConstructorReturn(_this);
    }
    _this.accordionHandle.addEventListener("click", function (event) {
      return (0,_utils__WEBPACK_IMPORTED_MODULE_0__.toggleAccordionContent)(event, _assertThisInitialized(_this), _this.content);
    });
    return _this;
  }

  /**
   * Observe Attributes.
   *
   * @return {string[]} Attributes to be observed.
   */
  _createClass(AquilaCheckboxAccordion, [{
    key: "attributeChangedCallback",
    value:
    /**
     * Attributes callback.
     *
     * Fired on attribute change.
     *
     * @param {string} name Attribute Name.
     * @param {string} oldValue Attribute's Old Value.
     * @param {string} newValue Attribute's New Value.
     */
    function attributeChangedCallback(name, oldValue, newValue) {
      /**
       * If the state of this checkbox filter is open, then set then
       * active state of this component to true, so it can be opened.
       */
      if ("active" === name) {
        this.content.style.height = "auto";
      } else {
        this.content.style.height = "0px";
      }
    }
  }], [{
    key: "observedAttributes",
    get: function get() {
      return ["active"];
    }
  }]);
  return AquilaCheckboxAccordion;
}( /*#__PURE__*/_wrapNativeSuper(HTMLElement));
var AquilaCheckboxAccordionChild = /*#__PURE__*/function (_HTMLElement2) {
  _inherits(AquilaCheckboxAccordionChild, _HTMLElement2);
  /**
   * Constructor.
   */
  function AquilaCheckboxAccordionChild() {
    var _this2;
    _classCallCheck(this, AquilaCheckboxAccordionChild);
    _this2 = _callSuper(this, AquilaCheckboxAccordionChild);
    _this2.content = _this2.querySelector(".checkbox-accordion__child-content");
    _this2.accordionHandle = _this2.querySelector(".checkbox-accordion__child-handle-icon");
    _this2.inputEl = _this2.querySelector("input");

    // Subscribe to updates.
    subscribe(_this2.update.bind(_assertThisInitialized(_this2)));
    if (_this2.accordionHandle && _this2.content) {
      _this2.accordionHandle.addEventListener("click", function (event) {
        return (0,_utils__WEBPACK_IMPORTED_MODULE_0__.toggleAccordionContent)(event, _assertThisInitialized(_this2), _this2.content);
      });
    }
    if (_this2.inputEl) {
      _this2.inputEl.addEventListener("click", function (event) {
        return _this2.handleCheckboxInputClick(event);
      });
    }
    return _this2;
  }

  /**
   * Update the component.
   *
   * @param {Object} currentState Current state.
   */
  _createClass(AquilaCheckboxAccordionChild, [{
    key: "update",
    value: function update() {
      var currentState = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
      if (!this.inputEl) {
        return;
      }
      var filters = currentState.filters;
      this.inputKey = this.inputEl.getAttribute("data-key");
      this.inputValue = this.inputEl.getAttribute("value");
      this.selectedFiltersForCurrentkey = filters[this.inputKey] || [];
      this.parentEl = this.inputEl.closest(".checkbox-accordion") || {};
      this.parentContentEl = this.inputEl.closest(".checkbox-accordion__child-content") || {};

      /**
       * If the current input value is amongst the selected filters, the check it.
       * and set the attributes and styles to open the accordion.
       */
      if (this.selectedFiltersForCurrentkey.includes(parseInt(this.inputValue))) {
        this.inputEl.checked = true;
        this.parentEl.setAttribute("active", true);
        if (this.parentContentEl.style) {
          this.parentContentEl.style.height = "auto";
        }
      } else {
        this.inputEl.checked = false;
        this.parentEl.removeAttribute("active");
      }
    }

    /**
     * Handle Checkbox input click.
     *
     * @param event
     */
  }, {
    key: "handleCheckboxInputClick",
    value: function handleCheckboxInputClick(event) {
      var _getState = getState(),
        addFilter = _getState.addFilter,
        deleteFilter = _getState.deleteFilter;
      var targetEl = event.target;
      this.filterKey = targetEl.getAttribute("data-key");
      if (targetEl.checked) {
        addFilter({
          key: this.filterKey,
          value: parseInt(targetEl.value)
        });
      } else {
        deleteFilter({
          key: this.filterKey,
          value: parseInt(targetEl.value)
        });
      }
    }
  }]);
  return AquilaCheckboxAccordionChild;
}( /*#__PURE__*/_wrapNativeSuper(HTMLElement));
var AquilaClearAllFilters = /*#__PURE__*/function (_HTMLElement3) {
  _inherits(AquilaClearAllFilters, _HTMLElement3);
  function AquilaClearAllFilters() {
    _classCallCheck(this, AquilaClearAllFilters);
    return _callSuper(this, AquilaClearAllFilters, arguments);
  }
  return _createClass(AquilaClearAllFilters);
}( /*#__PURE__*/_wrapNativeSuper(HTMLElement));
var AquilaFilters = /*#__PURE__*/function (_HTMLElement4) {
  _inherits(AquilaFilters, _HTMLElement4);
  function AquilaFilters() {
    _classCallCheck(this, AquilaFilters);
    return _callSuper(this, AquilaFilters, arguments);
  }
  return _createClass(AquilaFilters);
}( /*#__PURE__*/_wrapNativeSuper(HTMLElement));
var AquilaResultsCount = /*#__PURE__*/function (_HTMLElement5) {
  _inherits(AquilaResultsCount, _HTMLElement5);
  function AquilaResultsCount() {
    _classCallCheck(this, AquilaResultsCount);
    return _callSuper(this, AquilaResultsCount, arguments);
  }
  return _createClass(AquilaResultsCount);
}( /*#__PURE__*/_wrapNativeSuper(HTMLElement));
var AquilaResults = /*#__PURE__*/function (_HTMLElement6) {
  _inherits(AquilaResults, _HTMLElement6);
  function AquilaResults() {
    _classCallCheck(this, AquilaResults);
    return _callSuper(this, AquilaResults, arguments);
  }
  return _createClass(AquilaResults);
}( /*#__PURE__*/_wrapNativeSuper(HTMLElement));
var AquilaLoadMore = /*#__PURE__*/function (_HTMLElement7) {
  _inherits(AquilaLoadMore, _HTMLElement7);
  function AquilaLoadMore() {
    _classCallCheck(this, AquilaLoadMore);
    return _callSuper(this, AquilaLoadMore, arguments);
  }
  return _createClass(AquilaLoadMore);
}( /*#__PURE__*/_wrapNativeSuper(HTMLElement));
var AquilaLoadingMore = /*#__PURE__*/function (_HTMLElement8) {
  _inherits(AquilaLoadingMore, _HTMLElement8);
  function AquilaLoadingMore() {
    _classCallCheck(this, AquilaLoadingMore);
    return _callSuper(this, AquilaLoadingMore, arguments);
  }
  return _createClass(AquilaLoadingMore);
}( /*#__PURE__*/_wrapNativeSuper(HTMLElement));
var AquilaSearch = /*#__PURE__*/function (_HTMLElement9) {
  _inherits(AquilaSearch, _HTMLElement9);
  function AquilaSearch() {
    _classCallCheck(this, AquilaSearch);
    return _callSuper(this, AquilaSearch, arguments);
  }
  return _createClass(AquilaSearch);
}( /*#__PURE__*/_wrapNativeSuper(HTMLElement));
/**
 * Initialize.
 */
customElements.define("aquila-checkbox-accordion", AquilaCheckboxAccordion);
customElements.define("aquila-checkbox-accordion-child", AquilaCheckboxAccordionChild);
customElements.define("aquila-clear-all-filters", AquilaClearAllFilters);
customElements.define("aquila-filters", AquilaFilters);
customElements.define("aquila-results-count", AquilaResultsCount);
customElements.define("aquila-results", AquilaResults);
customElements.define("aquila-load-more", AquilaLoadMore);
customElements.define("aquila-loading-more", AquilaLoadingMore);
customElements.define("aquila-search", AquilaSearch);

/***/ }),

/***/ "./src/js/utils/index.js":
/*!*******************************!*\
  !*** ./src/js/utils/index.js ***!
  \*******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   slideElementDown: function() { return /* binding */ slideElementDown; },
/* harmony export */   slideElementUp: function() { return /* binding */ slideElementUp; },
/* harmony export */   toggleAccordionContent: function() { return /* binding */ toggleAccordionContent; }
/* harmony export */ });
/**
 * Toggle Accordion Content.
 *
 * @param {Event} event Event.
 * @param {Object} accordionEl Accordion Element
 * @param {Object} contentEl Content Element.
 *
 * @return {null} null
 */
var toggleAccordionContent = function toggleAccordionContent(event, accordionEl, contentEl) {
  event.preventDefault();
  event.stopPropagation();
  if (!accordionEl || !contentEl) {
    return null;
  }
  accordionEl.toggleAttribute("active");
  if (!accordionEl.hasAttribute("active")) {
    slideElementUp(contentEl, 600);
  } else {
    slideElementDown(contentEl, 600);
  }
};

/**
 * Slide element down.
 *
 * @param {Object} element Target element.
 * @param {number} duration Animation duration.
 * @param {Function} callback Callback function.
 */
var slideElementDown = function slideElementDown(element) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 300;
  var callback = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
  element.style.height = "".concat(element.scrollHeight, "px");
  setTimeout(function () {
    element.style.height = "auto";
    if (callback) {
      callback();
    }
  }, duration);
};

/**
 * Slide element up.
 *
 * @param {Object} element Target element.
 * @param {number} duration Animation duration.
 * @param {Function} callback Callback function.
 */
var slideElementUp = function slideElementUp(element) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 300;
  var callback = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
  element.style.height = "".concat(element.scrollHeight, "px");
  element.offsetHeight; // eslint-disable-line
  element.style.height = "0px";
  setTimeout(function () {
    element.style.height = null;
    if (callback) {
      callback();
    }
  }, duration);
};

/***/ }),

/***/ "./src/sass/search.scss":
/*!******************************!*\
  !*** ./src/sass/search.scss ***!
  \******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!**************************!*\
  !*** ./src/js/search.js ***!
  \**************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _search_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./search/index */ "./src/js/search/index.js");
/* harmony import */ var _sass_search_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../sass/search.scss */ "./src/sass/search.scss");


}();
/******/ })()
;
//# sourceMappingURL=search.js.map