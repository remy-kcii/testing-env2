// List of your website pages with descriptions
const pages = [
    { title: "About Us", url: "about.html", description: "Learn more about our company and our mission." },
    { title: "Careers", url: "careers.html", description: "Explore career opportunities with us." },
    { title: "Contact Us", url: "contact.html", description: "Get in touch with our team." },
    { title: "Finance and Accounting Support", url: "Finance-and-Accounting-Support.html", description: "Financial and accounting solutions." },
    { title: "Global Presence", url: "global-presence.html", description: "Our international operations and locations." },
    { title: "HR and Administration Support", url: "HR-and-Administration-Support.html", description: "HR and administrative support services." },
    { title: "Home", url: "index.html", description: "Welcome to our homepage." },
    { title: "International Tax", url: "International_tax.html", description: "Information on international tax services." },
    { title: "Locations", url: "locations.html", description: "Our office locations around the world." },
    { title: "News", url: "news.html", description: "Latest news and updates." },
    { title: "Operational and Risk Management", url: "Operational-and-Risk-Management.html", description: "Management of operations and risk." },
    { title: "Operational Efficiency and Compliance", url: "Operational-Efficiency-and-Compliance.html", description: "Ensuring operational efficiency and compliance." },
    { title: "Our People", url: "our-people.html", description: "Meet our team." },
    { title: "Our Services", url: "ourservices.html", description: "Overview of the services we offer." },
    { title: "Partnering for Sustainable Development and Impact", url: "Partnering-for-Sustainable-Development-and-Impact.html", description: "Our efforts in sustainable development." },
    { title: "Strategy and Growth Support", url: "Strategy-and-Growth-Support.html", description: "Supporting business strategy and growth." },
    { title: "Tax Compliance Services", url: "Tax_Compliance_services.html", description: "Services related to tax compliance." },
    { title: "Tax Strategy Services", url: "Tax_Strategy_Services.html", description: "Strategies for effective tax planning." },
    { title: "Terms and Conditions", url: "terms-conditions.html", description: "Our terms and conditions." },
    { title: "Transfer Pricing", url: "Transfer_pricing.html", description: "Information on transfer pricing." }
];

function displayResults() {
    // Get the search query from URL parameters
    const query = new URLSearchParams(window.location.search).get('q').toLowerCase();
    
    // Filter pages that match the query in title or description
    const results = pages.filter(page => 
        page.title.toLowerCase().includes(query) || 
        page.description.toLowerCase().includes(query)
    );

    // Display the results
    const resultsContainer = document.getElementById('searchResults');
    resultsContainer.innerHTML = ''; // Clear previous results

    if (results.length > 0) {
        results.forEach(result => {
            const resultItem = document.createElement('div');
            resultItem.innerHTML = `<a href="${result.url}">${result.title}</a> - ${result.description}`;
            resultsContainer.appendChild(resultItem);
        });
    } else {
        resultsContainer.innerHTML = '<p>No results found.</p>';
    }
}

// Execute the function to display results when the page loads
window.onload = displayResults;
