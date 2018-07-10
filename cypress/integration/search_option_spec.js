describe("search options", function() {
  beforeEach(function() {
    cy.visit("http://localhost:8080")
  })

  function setAvxOnly() {
    cy.get("#setnone").click() && cy.get("#set0").click()
  }

  it("can search by card number", function() {
    cy.get("#filt0").type("142")
    cy.get("#main > tbody > tr").should("have.length.below", 30)
    cy.get("#main").should("contain", "Electro: Cooked Meat")
    cy.get("#main").should("not.contain", "Black Widow: Spider's Bite")
  })

  it("can search by subtitle", function() {
    cy.get("#filt1").type("Mistress of Pain")
    cy.get("#main > tbody > tr").should("have.length", 1)
    cy.get("#count").should("contain", "1")
    cy.get("#main").should("contain", "Black Widow: Mistress of Pain")
  })

  it("can search by subtitle", function() {
    cy.get("#filt2").type("While Black Widow is active, when")
    cy.get("#main > tbody > tr").should("have.length", 1)
    cy.get("#main").should("contain", "Black Widow: Spider's Bite")
  })

  it("can clear searches", function() {
    cy.get("#filt1").type("Black Widow")
    cy.get("#main > tbody > tr").should("have.length.below", 30)
    cy.get("#clear").click()
    cy.get("#main > tbody > tr").should("have.length.above", 30)
  })

  it("can filter by set", function() {
    cy.get("#setnone").click()
    //cy.get("#main > tbody > tr").should("have.length", 0)
    cy.get("#set0").click()
    cy.get("#main").should("contain", "Beast: Big Boy Blue")
  })

  it("progressively loads cards", function() {
    cy.get("#main > tbody > tr").should("have.length", 51)
    cy.scrollTo("bottom")
    cy.get("#main > tbody > tr").should("have.length", 101)
    cy.scrollTo("bottom")
    cy.get("#main > tbody > tr").should("have.length", 151)
  })

  it("can filter by energy type", function() {
    var  genericCard = "Focus Power: Basic Action Card"
    var  maskCard = "Beast: Big Boy Blue"

    setAvxOnly()

    cy.get("#search_energy_off").click()
    cy.get("#energy0").should("be.visible")
    cy.get("#search_energy_on img").last().should("have.attr", "src", "images/e4.png")

    cy.get("#energy0").click()
    cy.get("#main").should("not.contain", maskCard).should("contain", genericCard)

    cy.get("#energy0").click() && cy.get("#energy1").click()
    cy.get("#main").should("not.contain", genericCard).should("contain", maskCard)

    cy.get("#search_energy_on > button").click()
    cy.get("#energy0").should("not.be.visible")
    cy.get("#main").should("contain", maskCard).should("contain", genericCard)
  })

  it("can filter by type", function() {
    var  characterCard = "Hulk: Anger Issues"
    var  actionCard = "Mjolnir: Fist of the Righteous"

    setAvxOnly()

    cy.get("#search_type_off").click()
    cy.get("#type0").should("be.visible")

    cy.get("#type0").click()
    cy.get("#main").should("not.contain", actionCard).should("contain", characterCard)

    cy.get("#type0").click() && cy.get("#type1").click()
    cy.get("#main").should("not.contain", characterCard).should("contain", actionCard)

    cy.get("#search_type_on > button").click()
    cy.get("#type0").should("not.be.visible")
    cy.get("#main").should("contain", characterCard)
  })

  it("can filter by rarity", function() {
    var  starterCard = "Hulk: Anger Issues"
    var  commonCard = "Angel: High Ground"

    setAvxOnly()

    cy.get("#search_rarity_off").click()
    cy.get("#rarity0").should("be.visible")

    cy.get("#rarity0").click()
    cy.get("#main").should("not.contain", commonCard).should("contain", starterCard)

    cy.get("#rarity0").click() && cy.get("#rarity1").click()
    cy.get("#main").should("not.contain", starterCard).should("contain", commonCard)

    cy.get("#search_rarity_on > button").click()
    cy.get("#rarity0").should("not.be.visible")
    cy.get("#main").should("contain", starterCard)
  })

  it("can filter by cost", function() {
    var cheapCard = "Beast: Big Boy Blue"
    var expensiveCard = "Hulk: Anger Issues"

    setAvxOnly()

    cy.get("#cost_min").select("4")
    cy.get("#cost_max").select("10")
    cy.get("#main").should("not.contain", cheapCard).should("contain", expensiveCard)

    cy.get("#cost_min").select("0")
    cy.get("#cost_max").select("5")
    cy.get("#main").should("not.contain", expensiveCard).should("contain", cheapCard)
  })

  it("can filter by gender", function() {
    var  maleCard = "Hulk: Anger Issues"
    var  femaleCard = "Black Widow: Natural"

    setAvxOnly()

    cy.get("#search_gender_off").click()
    cy.get("#gender0").should("be.visible")

    cy.get("#gender0").click()
    cy.get("#main").should("not.contain", femaleCard).should("contain", maleCard)

    cy.get("#gender0").click() && cy.get("#gender1").click()
    cy.get("#main").should("not.contain", maleCard).should("contain", femaleCard)

    cy.get("#search_gender_on > button").click()
    cy.get("#gender0").should("not.be.visible")
    cy.get("#main").should("contain", maleCard)
  })

  it("can filter by affiliation", function() {
    var  neutralCard = "Spider-Man: Webhead"
    var  xmenCard = "Beast: Big Boy Blue"

    setAvxOnly()

    cy.get("#search_affiliation_off").click()
    cy.get("#affiliation0").should("be.visible")
    cy.get("#search_affiliation_on img").first().should("have.attr", "src", "images/a0.png")

    cy.get("#affiliation0").click()
    cy.get("#main").should("not.contain", xmenCard).should("contain", neutralCard)

    cy.get("#affiliation0").click() && cy.get("#affiliation1").click()
    cy.get("#main").should("not.contain", neutralCard).should("contain", xmenCard)

    cy.get("#search_affiliation_on > button").click()
    cy.get("#affiliation0").should("not.be.visible")
    cy.get("#main").should("contain", neutralCard)
  })

  it("can filter by format", function() {
    var  modernCard = "Black Widow: Red Scare"
    var  goldenCard = "Black Widow: Tsarina"

    cy.get("#filt1").type("Black Widow")

    cy.get("#informat").select("Modern Era")
    cy.get("#main").should("not.contain", goldenCard).should("contain", modernCard)

    cy.get("#informat").select("Golden Era")
    cy.get("#main").should("contain", goldenCard).should("contain", modernCard)
  })

  it("can produce a search link", function() {
    cy.get("#filt1").type("Black Widow")

    cy.contains("Show Search Link").click()

    cy.get("#permalink").should("contain", "?search&name=Black%20Widow")
  })
})

