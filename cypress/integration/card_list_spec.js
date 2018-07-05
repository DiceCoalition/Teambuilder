describe("card list functions", function() {
  beforeEach(function() {
    cy.visit("http://localhost:8080")
  })


  it("can display a preview image", function() {
    var imageUrl = "http://www.thereservepool.com/images/smilies/cards/asm38large.jpg"

    cy.get("#filt1").type("Black Widow")
    cy.get("#cardpreview").should("not.be.visible")

    cy.contains("Black Widow: Stinger").click()
    cy.get("#cardpreview").should("be.visible").should("have.attr", "src", imageUrl)

    cy.get("#cardpreview").click()
    cy.get("#cardpreview").should("not.be.visible")

    cy.contains("Black Widow: Stinger").click()
    cy.get("#cardpreview").should("be.visible")

    cy.contains("Black Widow: Stinger").click()
    cy.get("#cardpreview").should("not.be.visible")
  })

  it("can resort columns", function() {
    var  lastCard = "Black Widow: Tsarina"

    cy.get("#filt1").type("Black Widow")
    cy.get("#main > tbody > tr").last().should("contain", lastCard)

    cy.get("#sort1").click() 
    cy.get("#main > tbody > tr").first().should("contain", lastCard)
  })
})
