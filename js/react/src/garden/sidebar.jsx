import React from "react";

import HelpButton from "../common/helpButton.jsx";
import {SearchWidget} from "../common/search.jsx";
import FeatureSelector from "./featureSelector.jsx";

const CLIENT_ROOT = "..";
const CID_WIDTH = 738;
const CID_HEIGHT = 140;

/**
 * @param valueArray {number[]} An array in the form [min, max]
 * @returns {string} An English description of the [min, max] values
 */
function getSliderDescription(valueArray) {
  let valueDesc;

  // Fix if the handles have switched
  if (valueArray[0] > valueArray[1]) {
    let tmp = valueArray[0];
    valueArray[0] = valueArray[1];
    valueArray[1] = tmp;
  }

  if (valueArray[0] === 0 && valueArray[1] === 50) {
    valueDesc = "(Any size)";
  } else if (valueArray[0] === 0) {
    valueDesc = `(At most ${valueArray[1]} ft)`;
  } else if (valueArray[1] === 50) {
    valueDesc = `(At least ${valueArray[0]} ft)`;
  } else {
    valueDesc = `(${valueArray[0]} ft - ${valueArray[1]} ft)`
  }

  return valueDesc;
}

/**
 * Sidebar header with title, subtitle, and help
 */
class SideBarHeading extends React.Component {
  render() {
    return (
      <div style={{color: "black"}}>
        <div className="mb-1" style={{color: "inherit"}}>
          <h3 className="font-weight-bold d-inline">Search for plants</h3>
          <HelpButton
            title="Search for plants"
            html={
                    `
              <ul>
                <li>As you make selections, the filtered results are immediately displayed in “Your search results”.</li>
                <li>Any number of search options may be selected, but too many filters may yield no results because no plant meets all the criteria you selected. If so, try removing filters.</li>
                <li>To remove a search filter, simply click its close (X) button</li>
                <li>Clicking on any image in the results will open that plants’ garden profile page; the page can be downloaded and printed.</li>
              </ul>
            `
            }
          />
        </div>
        <p>
          Start applying characteristics, and the matching plants will appear at
          right.
        </p>
      </div>
    );
  }
}

/**
 * 'Plant Need' dropdown with label
 */
function PlantNeed(props) {
  return (
    <div className = "input-group pt-3 mt-3" style={{ borderTop: "1px dashed black" }}>
      <label className="font-weight-bold" htmlFor={ props.label.toLowerCase() }>
        { props.label }
      </label>
      <select
        name={ props.label.toLowerCase().replace(/[^a-z]/g, '') }
        className="form-control ml-auto text-capitalize"
        style={{ maxWidth: "50%" }}
        value={ props.value }
        onChange={ props.onChange }>
        <option key="select" value="" disabled hidden>Select...</option>
        {
          props.choices.map((opt) => {
            return (
              <option
                key={ opt.cs }
                value={ opt.cs }
                className="text-capitalize"
              >
                { opt.charstatename }
              </option>
            );
          })
        }
      </select>
    </div>
  );
}

/**
 * Slider from 0, 50+ with minimum and maximum value handles
 */
class PlantSlider extends React.Component {
  constructor(props) {
    super(props);
    this.state = { description: "(Any size)" };
    this.slider = null;
    this.registerSliderEvent = this.registerSliderEvent.bind(this);
    this.reset = this.reset.bind(this);
  }

  componentDidMount() {
    const sliderId = `slider-container-${this.props.name}`;
    this.slider = new Slider(`#${sliderId}`, {
      value: this.props.value.map((i) => parseInt(i)),
      ticks: [0, 10, 20, 30, 40, 50],
      ticks_labels: ["0", "", "", "", "", "50+"],
      ticks_snap_bounds: 1
    });

    this.registerSliderEvent();
  }

  componentWillUnmount() {
    this.slider.destroy();
    this.slider = null;
  }

  registerSliderEvent() {
    if (this.props.onChange) {
      const onChangeEvent = this.props.onChange;
      this.slider.off("slide");
      this.slider.on("slide", (sliderArray) => {
        this.setState({ description: getSliderDescription(sliderArray) });
        const fakeEvent = { target: { value: sliderArray } };
        onChangeEvent(fakeEvent);
      });
    }
  }

  reset() {
    if (this.slider !== null) {
      this.slider.refresh();
      this.setState({ description: getSliderDescription(PlantSlider.defaultProps.value) });
      this.registerSliderEvent();
    }
  }

  render() {
    return (
      <div>
        <label className="d-block text-center" htmlFor={ this.props.name }>{ this.props.label }</label>
        <input
          id={ "slider-container-" + this.props.name }
          type="text"
          className="bootstrap-slider"
          name={ this.props.name }
          onChange={ (e) => this.props.onChange(e) }
        />
        <br/>
        <label className="d-block text-center" htmlFor={ this.props.name }>
          { this.state.description }
        </label>
      </div>
    );
  }
}

PlantSlider.defaultProps = {
  value: [0, 50]
};

class SideBarDropdown extends React.Component {
  constructor(props) {
    super(props);
    this.state = { isExpanded: false };
    this.onButtonClicked = this.onButtonClicked.bind(this);
  }

  onButtonClicked() {
    if (this.props.disabled !== "true") {
      this.setState({isExpanded: !this.state.isExpanded});
    }
  }

  render() {
    let dropDownId = this.props.title;
    dropDownId = dropDownId.toLowerCase().replace(/[^a-z]/g, "").concat("-dropdown-body");

    return (
      <div
        className={ "my-3 py-auto" + (this.props.disabled === true ? " dropdown-disabled" : "") }
        style={ this.props.style } >
        <div className="row">
          <h4 className="mx-0 my-auto col" style={{ cursor: "default", fontSize: this.props.style.fontSize }}>
            {this.props.title}
          </h4>
          <button
            className="d-block col-sm-auto"
            data-toggle="collapse"
            data-target={ "#" + dropDownId }
            type="button"
            aria-expanded={ this.state.isExpanded.toString() }
            aria-controls={ dropDownId }
            onClick={ this.onButtonClicked }
            disabled={ this.props.disabled }
          >
            <img
              className={ "ml-auto will-v-flip" + (this.state.isExpanded ? " v-flip" : "") }
              style={{ background: "black", borderRadius: "50%", height: "2em", width: "2em" }}
              src={ `${CLIENT_ROOT}/images/garden/expand-arrow.png` }
              alt="collapse"
            />
          </button>
        </div>
        <div id={dropDownId} className="collapse">
          <div className="card card-body mt-2">
            { this.props.children }
          </div>
        </div>
      </div>
    );
  }
}

SideBarDropdown.defaultProps = {
  title: '',
  style: { padding: "1em", backgroundColor: "white", borderRadius: "0.5em", fontSize: "initial" },
};

/**
 * Full sidebar
 */
class SideBar extends React.Component {
  constructor(props) {
    super(props);
    this.sliderRefWidth = React.createRef();
    this.sliderRefHeight = React.createRef();

    this.resetWidth = this.resetWidth.bind(this);
    this.resetHeight = this.resetHeight.bind(this);
  }

  resetWidth() {
    this.sliderRefWidth.current.reset();
  }

  resetHeight() {
    this.sliderRefHeight.current.reset();
  }

  render() {
    return (
      <div
        id="sidebar"
        className="m-1 p-3 rounded-border"
        style={ this.props.style }>

        {/* Title & Subtitle */}
        <SideBarHeading />

        {/* Search */}
        <SearchWidget
          name="search-garden-sidebar"
          placeholder="Search plants by name"
          onChange={ this.props.onSearchTextChanged }
          onClick={ this.props.onSearch }
          value={ this.props.searchText }
          isLoading={ this.props.isLoading }
          clientRoot={ CLIENT_ROOT }
          autoComplete={ true }
          autoCompleteUrl={ `${CLIENT_ROOT}/garden/rpc/autofillsearch.php` }
        />

        {/* Sunlight & Moisture */}
        <div style={{ background: "white" }} className="rounded-border p-4">
          <h4>Plant needs</h4>
          {
            Object.keys(this.props.plantNeeds).map((i) => {
              let plantNeed = this.props.plantNeeds[i];
              return (
                <PlantNeed
                  key={ i }
                  label={ plantNeed.charname }
                  choices={
                    Object.keys(plantNeed.states).map((j) => {
                      return { cs: j, charstatename: plantNeed.states[j] }
                    })
                  }
                  value={ plantNeed.value }
                  onChange={ (e) => this.props.onPlantNeedChanged(i, e.target.value) } />
              )
            })
          }
        </div>

        {/* Sliders */}
        <div className="my-5">
          <h4 className="mr-2 mb-2 d-inline">Mature Size</h4>
          <span>(Just grab the slider dots)</span><br />
          <div className="mt-2 row d-flex justify-content-center">
            <div className="col-sm-5 mr-2">
              <PlantSlider
                ref={ this.sliderRefHeight }
                label="Height (ft)"
                name="height"
                value={ this.props.height }
                onChange={ (e) => this.props.onPlantSizeChanged(CID_HEIGHT, e.target.value) } />
            </div>
            <div
              style={{ width: "1px", borderRight: "1px dashed grey", marginLeft: "-0.5px" }}
            />
            <div className="col-sm-5 ml-2">
              <PlantSlider
                ref={ this.sliderRefWidth }
                label="Width (ft)"
                name="width"
                value={ this.props.width }
                onChange={ (e) => this.props.onPlantSizeChanged(CID_WIDTH, e.target.value) } />
            </div>
          </div>
        </div>

        {/* Dropdowns */}
        <div>
          <SideBarDropdown title="Plant features">
            {
              Object.keys(this.props.plantFeatures).map((i) => {
                let plantFeature = this.props.plantFeatures[i];
                return (
                  <FeatureSelector
                    key={ i }
                    title={ plantFeature.charname }
                    items={ plantFeature.states }
                    onChange={ (featureKey) => {
                      this.props.onPlantFeaturesChanged(i, featureKey)
                    }}
                  />
                )
              })
            }
          </SideBarDropdown>

          <SideBarDropdown title="Growth & maintenance">
            {
              Object.keys(this.props.growthMaintenance).map((i) => {
                let plantFeature = this.props.growthMaintenance[i];
                return (
                  <FeatureSelector
                    key={ i }
                    title={ plantFeature.charname }
                    items={ plantFeature.states }
                    onChange={ (featureKey) => {
                      this.props.onGrowthMaintenanceChanged(i, featureKey)
                    }}
                  />
                )
              })
            }
          </SideBarDropdown>

          <SideBarDropdown title="Beyond the garden">
            {
              Object.keys(this.props.beyondGarden).map((i) => {
                let plantFeature = this.props.beyondGarden[i];
                return (
                  <FeatureSelector
                    key={ i }
                    title={ plantFeature.charname }
                    items={ plantFeature.states }
                    onChange={ (featureKey) => {
                      this.props.onBeyondGardenChanged(i, featureKey)
                    }}
                  />
                )
              })
            }
          </SideBarDropdown>

          <SideBarDropdown title="Availability (Coming soon)" disabled={ true } />
        </div>
      </div>
    );
  }
}

SideBar.defaultProps = {
  sunlight: '',
  moisture: '',
  width: [0, 50],
  height: [0, 50],
  plantFeatures: {},
  growthMaintenance: {},
  beyondGarden: {},
  onPlantFeaturesChanged: () => {},
  onGrowthMaintenanceChanged: () => {},
  onBeyondGardenChanged: () => {}
};

export default SideBar;
