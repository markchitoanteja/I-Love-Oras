
# 🌐 Tourist Web Portal Task List

This document outlines the tasks based on adviser feedback for the development of the tourist web portal.

---

## 🗺️ Feature 1: “More Info” — Show Directions to Tourist Spot

### Tasks
- [ ] Add a "Get Directions" section in the tourist spot detail page.
- [ ] Integrate mapping service (e.g. Google Maps, Mapbox).
- [ ] Detect or request user's location (via browser or allow manual input).
- [ ] Show route and travel options from current location to tourist spot.
- [ ] Ensure mobile responsiveness and cross-browser compatibility.
- [ ] Add loading/fallback behavior for users who block location access.

### Notes
- Use route APIs for real-time direction.  
- Optimize for performance on slow networks.  
- Consider accessibility (screen readers, keyboard nav).

---

## 🖼️ Feature 2: Admin Panel – Upload Images for Public Content

### Tasks
- [ ] Create UI components for image uploads (News, Posts, Tourist Spots).
- [ ] Implement image validation (format, size, dimensions).
- [ ] Store images securely (e.g. cloud storage, CDN, or local storage).
- [ ] Create image preview before upload.
- [ ] Connect uploads to corresponding database entities (News, Posts, Tourist Spots).
- [ ] Provide edit/delete image options in admin panel.

### Notes
- Consider drag-and-drop support for UX.  
- Use image compression tools (client-side or server-side).  
- Secure uploads (auth checks, content validation).

---

## 📊 Feature 3: Visitor Reports (Daily, Monthly, Annual)

### Tasks
- [ ] Design visitor tracking system (based on visits or check-ins).
- [ ] Collect and store timestamped visit logs for each tourist spot.
- [ ] Create data aggregation logic for daily, monthly, and annual summaries.
- [ ] Build admin dashboard components to view visitor stats.
- [ ] Add filter by date, tourist spot, and time range.
- [ ] Export reports to CSV or PDF.

### Notes
- Consider privacy and consent if tracking real users.  
- Use data visualization (charts/graphs) for better insight.  
- Schedule nightly/monthly cron jobs to pre-process aggregated data if traffic scales.

---

**Last Updated:** July 11, 2025
