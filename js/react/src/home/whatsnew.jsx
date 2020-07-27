import ReactDOM from "react-dom";
import React from "react";
import httpGet from "../common/httpGet.js";


class WhatsNew extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      news: [],
      events: []
    };
  }

  componentDidMount() {

		httpGet(`../home/rpc/api.php`)
			.then((res) => {
				res = JSON.parse(res);
				
				this.setState({
					news: res.news,
					events: res.events,
				});
				const pageTitle = document.getElementsByTagName("title")[0];
				pageTitle.innerHTML = `${pageTitle.innerHTML} What's New`;
			})
			.catch((err) => {
				console.error(err);
			});
  }//componentDidMount
  
  render() {

		
    return (
				<div id="info-page">
						<section id="titlebackground" className="title-blueberry">
								<div className="inner-content">
										<h1>News and Events</h1>
								</div>
						</section>
						<section className="news-events-content">
								<div className="inner-content">
										<div className="row">
												<div id="column-main" className="col-lg-8 news-col">
												
												
														{	this.state.news.map((item,index) => {
													
																return (						
																	<div key={index} className="news-item">
																			<h2 dangerouslySetInnerHTML={{__html: item.title}} ></h2>
																			<figure className="figure news-figure">
																					<img src={ item.image_src } className="figure-img img-fluid z-depth-1" alt={ item.image_alt } style={{width: 400}} />
																					<figcaption className="figure-caption" dangerouslySetInnerHTML={{__html: item.caption}} ></figcaption>
																			</figure>
																			<p className="news-byline">{ item.byline }</p>
																			<p dangerouslySetInnerHTML={{__html: item.content}}></p>
																	</div>
																	
																)
															})
														}

												</div>
												<div id="column-right" className="col-lg-4 events-col">
														<h2>Upcoming Events</h2>
														<div className="event-item">
																<h3>2 JULY 2019, 8am-5pm</h3>
																<div className="event-content">
																		<p><strong>Display: BEEvent Pollinator Conference.</strong> Sponsored by Linn Co. Master Gardeners. Linn Co. Fair & Expo Center, Albany, OR.</p>
																</div>
														</div>
														<div className="event-item">
																<h3>2 JULY 2019, 8am-5pm</h3>
																<div className="event-content">
																		<p><strong>Display: BEEvent Pollinator Conference.</strong> Sponsored by Linn Co. Master Gardeners. Linn Co. Fair & Expo Center, Albany, OR.</p>
																</div>
														</div>
												</div>
										</div>
								</div> 
						</section>
				</div>

    );
  }
}


const headerContainer = document.getElementById("react-header");
const dataProps = JSON.parse(headerContainer.getAttribute("data-props"));
const domContainer = document.getElementById("react-whatsnew-app");
ReactDOM.render(
	<WhatsNew clientRoot={ dataProps["clientRoot"] } />,
	domContainer
);