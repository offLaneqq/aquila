import { toggleAccordionContent } from "../utils";

// import {} from './data';

class AquilaCheckboxAccordion extends HTMLElement {
  /**
   * Constructor.
   */
  constructor() {
    super();

    // Elements.
    this.filterKey = this.getAttribute("key");
    this.content = this.querySelector(".checkbox-accordion__content");
    this.accordionHandle = this.querySelector(".checkbox-accordion__handle");

    if (!this.accordionHandle || !this.content || !this.filterKey) {
      return;
    }

    this.accordionHandle.addEventListener("click", (event) =>
      toggleAccordionContent(event, this, this.content)
    );
  }

  /**
   * Observe Attributes.
   *
   * @return {string[]} Attributes to be observed.
   */
  static get observedAttributes() {
    return ["active"];
  }

  /**
   * Attributes callback.
   *
   * Fired on attribute change.
   *
   * @param {string} name Attribute Name.
   * @param {string} oldValue Attribute's Old Value.
   * @param {string} newValue Attribute's New Value.
   */
  attributeChangedCallback(name, oldValue, newValue) {
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
}
class AquilaCheckboxAccordionChild extends HTMLElement {
  /**
   * Constructor.
   */
  constructor() {
    super();

    this.content = this.querySelector(".checkbox-accordion__child-content");
    this.accordionHandle = this.querySelector(
      ".checkbox-accordion__child-handle-icon"
    );
    this.inputEl = this.querySelector("input");

    // Subscribe to updates.
    subscribe(this.update.bind(this));

    if (this.accordionHandle && this.content) {
      this.accordionHandle.addEventListener("click", (event) =>
        toggleAccordionContent(event, this, this.content)
      );
    }
    if (this.inputEl) {
      this.inputEl.addEventListener("click", (event) =>
        this.handleCheckboxInputClick(event)
      );
    }
  }

  /**
   * Update the component.
   *
   * @param {Object} currentState Current state.
   */
  update(currentState = {}) {
    if (!this.inputEl) {
      return;
    }

    const { filters } = currentState;
    this.inputKey = this.inputEl.getAttribute("data-key");
    this.inputValue = this.inputEl.getAttribute("value");
    this.selectedFiltersForCurrentkey = filters[this.inputKey] || [];
    this.parentEl = this.inputEl.closest(".checkbox-accordion") || {};
    this.parentContentEl =
      this.inputEl.closest(".checkbox-accordion__child-content") || {};

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
  handleCheckboxInputClick(event) {
    const { addFilter, deleteFilter } = getState();
    const targetEl = event.target;
    this.filterKey = targetEl.getAttribute("data-key");

    if (targetEl.checked) {
      addFilter({
        key: this.filterKey,
        value: parseInt(targetEl.value),
      });
    } else {
      deleteFilter({
        key: this.filterKey,
        value: parseInt(targetEl.value),
      });
    }
  }
}
class AquilaClearAllFilters extends HTMLElement {}
class AquilaFilters extends HTMLElement {}
class AquilaResultsCount extends HTMLElement {}
class AquilaResults extends HTMLElement {}
class AquilaLoadMore extends HTMLElement {}
class AquilaLoadingMore extends HTMLElement {}
class AquilaSearch extends HTMLElement {}

/**
 * Initialize.
 */
customElements.define("aquila-checkbox-accordion", AquilaCheckboxAccordion);
customElements.define(
  "aquila-checkbox-accordion-child",
  AquilaCheckboxAccordionChild
);
customElements.define("aquila-clear-all-filters", AquilaClearAllFilters);
customElements.define("aquila-filters", AquilaFilters);
customElements.define("aquila-results-count", AquilaResultsCount);
customElements.define("aquila-results", AquilaResults);
customElements.define("aquila-load-more", AquilaLoadMore);
customElements.define("aquila-loading-more", AquilaLoadingMore);
customElements.define("aquila-search", AquilaSearch);
