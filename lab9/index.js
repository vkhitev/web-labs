var models = require('./server/models/')
models.sequelize
  .authenticate().then(() => {
    console.log('Everything ok')
  })
  .catch(function (error) {
    console.log('Error creating connection:', error)
  })
